@extends('layouts.app')

@section('template_title')
    Crear Venta
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Registrar Venta') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">{{ __('Cliente') }}</label>
                            <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                                <option value="" disabled selected>{{ __('Selecciona un cliente') }}</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="producto_id" class="form-label">{{ __('Producto') }}</label>
                            <select name="producto_id" id="producto_id" class="form-select @error('producto_id') is-invalid @enderror">
                                <option value="" disabled selected>{{ __('Selecciona un producto') }}</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }} (Stock: {{ $producto->stock }})</option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control @error('cantidad') is-invalid @enderror" min="1">
                            @error('cantidad')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Registrar Venta') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
