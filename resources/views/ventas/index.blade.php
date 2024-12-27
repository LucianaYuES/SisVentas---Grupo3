@extends('layouts.app')

@section('template_title')
    Lista de Ventas
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Ventas') }}</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->id }}</td>
                                    <td>{{ $venta->cliente->nombre }}</td>
                                    <td>{{ $venta->producto->nombre }}</td>
                                    <td>{{ $venta->cantidad }}</td>
                                    <td>${{ $venta->total }}</td>
                                    <td>{{ $venta->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('ventas.pdf', $venta->id) }}" class="btn btn-sm btn-primary">
                                            Descargar PDF
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{ $ventas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
