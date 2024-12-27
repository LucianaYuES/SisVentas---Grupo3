<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Venta</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .boleta { width: 80%; margin: 20px auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; font-size: 24px; }
        .header p { margin: 5px 0; font-size: 14px; color: #555; }
        .content { margin-top: 20px; }
        .content p { font-size: 14px; margin: 5px 0; }
        .table-container { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { border: 1px solid #ddd; padding: 8px; text-align: left; font-size: 14px; }
        table th { background-color: #f4f4f4; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="boleta">
        <!-- Encabezado -->
        <div class="header">
            <h2>Comprobante de Venta</h2>
            <p>Mi Tienda S.A.C.</p>
            <p>RUC: 12345678901</p>
            <p>Dirección: Av. Ejemplo 123, Ciudad</p>
            <p>Teléfono: (01) 123-4567</p>
        </div>

        <!-- Información de la Venta -->
        <div class="content">
            <p><strong>Número de Boleta:</strong> {{ $venta->id }}</p>
            <p><strong>Fecha:</strong> {{ $venta->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
        </div>

        <!-- Detalles del Producto -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $venta->producto->nombre }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>${{ number_format($venta->producto->precio, 2) }}</td>
                        <td>${{ number_format($venta->producto->precio * $venta->cantidad, 2) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                        <td>${{ number_format($venta->total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Calculo del IGV -->
        @php
            $subtotal = $venta->cantidad * $venta->producto->precio;
            $igv = $subtotal * 0.18; // 18% de IGV
            $total = $subtotal + $igv;
        @endphp

        <!-- Totales -->
        <p class="total">Subtotal: ${{ number_format($subtotal, 2) }}</p>
        <p class="total">IGV (18%): ${{ number_format($igv, 2) }}</p>
        <p class="total">Total: ${{ number_format($total, 2) }}</p>

        <!-- Pie de página -->
        <div class="footer">
            <p>Gracias por su compra</p>
            <p>Este documento es una representación impresa de su transacción.</p>
        </div>
    </div>
</body>
</html>


<!-- Este es el documento que esta bien
