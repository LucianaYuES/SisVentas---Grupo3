<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Product; 
use App\Models\Client; 
use Illuminate\Http\Request;

class ConsultaVentaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener los filtros de la consulta
        $filtroProducto = $request->input('producto');
        $filtroCliente = $request->input('cliente');

        // Consultar las ventas según los filtros
        $ventas = Venta::query();

        if ($filtroProducto) {
            $ventas->where('producto_id', $filtroProducto);
        }

        if ($filtroCliente) {
            $ventas->where('cliente_id', $filtroCliente);
        }

        $ventas = $ventas->get();

        // Obtener productos y clientes para los filtros
        $productos = Product::all(); 
        $clientes = Client::all();  

        return view('consultas.index', compact('ventas', 'productos', 'clientes'));
    }
}

