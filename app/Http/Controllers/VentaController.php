<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;
use PDF;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carga las ventas con sus relaciones
        $ventas = Venta::with('cliente', 'producto')->paginate();

        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtén todos los clientes y productos
        $clientes = Client::all();
        $productos = Product::all();

        return view('ventas.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clients,id', // Verifica que el cliente exista
            'producto_id' => 'required|exists:products,id', // Verifica que el producto exista
            'cantidad' => 'required|integer|min:1', // Asegura que la cantidad sea válida
        ]);

        // Encuentra el producto
        $producto = Product::findOrFail($validated['producto_id']);

        // Verifica si hay stock suficiente
        if ($producto->stock < $validated['cantidad']) {
            return back()->withErrors(['cantidad' => 'Stock insuficiente para realizar la venta.']);
        }

        // Calcula el total
        $total = $producto->precio * $validated['cantidad'];

        // Crea la venta
        $venta = Venta::create([
            'cliente_id' => $validated['cliente_id'],
            'producto_id' => $validated['producto_id'],
            'cantidad' => $validated['cantidad'],
            'total' => $total,
        ]);

        // Disminuye el stock del producto
        $producto->disminuirStock($validated['cantidad']);

        // Redirige al índice de ventas con un mensaje de éxito
        return redirect()->route('ventas.index')->with('success', 'Venta realizada correctamente.');
    }

    public function generarPDF($id)
    {
        $venta = Venta::with(['cliente', 'producto'])->findOrFail($id);
    
        $data = [
            'venta' => $venta,
        ];
    
        $pdf = PDF::loadView('ventas.pdf', $data);
    
        return $pdf->download('comprobante-venta-' . $venta->id . '.pdf');
    }
    
}
