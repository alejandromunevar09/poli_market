<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reabastecer(Request $request)
    {
        $request->validate([
            'bodega_id' => 'required|exists:bodegas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $stock = StockProducto::firstOrCreate([
            'bodega_id' => $request->bodega_id,
            'producto_id' => $request->producto_id
        ]);

        $stock->cantidad += $request->cantidad;
        $stock->save();

        return response()->json(['message' => 'Producto reabastecido.', 'stock' => $stock]);
    }

    public function registrarSalida(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'bodega_id' => 'required|exists:bodegas,id'
        ]);

        $venta = Venta::with('detalles')->findOrFail($request->venta_id);

        foreach ($venta->detalles as $detalle) {
            $stock = StockProducto::where('producto_id', $detalle->producto_id)
                ->where('bodega_id', $request->bodega_id)
                ->first();

            if (!$stock || $stock->cantidad < $detalle->cantidad) {
                return response()->json([
                    'message' => "No hay suficiente stock para el producto ID {$detalle->producto_id}"
                ], 400);
            }

            $stock->cantidad -= $detalle->cantidad;
            $stock->save();
        }

        return response()->json(['message' => 'Salida registrada y stock actualizado.']);
    }

    public function consultarStock($productoId, $bodegaId)
    {
        $stock = StockProducto::where('producto_id', $productoId)
            ->where('bodega_id', $bodegaId)
            ->first();

        if (!$stock) {
            return response()->json(['message' => 'No hay stock registrado para este producto en la bodega.'], 404);
        }

        return response()->json([
            'producto_id' => $productoId,
            'bodega_id' => $bodegaId,
            'cantidad' => $stock->cantidad
        ]);
    }

    
}
