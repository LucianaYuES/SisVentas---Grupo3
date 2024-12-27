@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consulta de Ventas</h1>

    <form method="GET" action="{{ route('consultas.index') }}" class="mb-4">
        <div class="row">
            <!-- Filtro de Producto -->
            <div class="col-md-4">
                <label for="producto" class="form-label">Producto</label>
                <select name="producto" id="producto" class="form-control">
                    <option value="">Seleccionar Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" {{ request('producto') == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro de Cliente -->
            <div class="col-md-4">
                <label for="cliente" class="form-label">Cliente</label>
                <select name="cliente" id="cliente" class="form-control">
                    <option value="">Seleccionar Cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ request('cliente') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Tabla de Ventas -->
    @if($ventas->isEmpty())
        <p>No se encontraron resultados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $venta->cliente->nombre }}</td>
                        <td>{{ $venta->producto->nombre }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>{{ number_format($venta->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
