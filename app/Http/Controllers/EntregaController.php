<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntregaController extends Controller
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

    public function registrar(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'bodega_id' => 'required|exists:bodegas,id',
            'fechaEntrega' => 'required|date',
            'estado' => 'required|string',
            'cantidad' => 'required|integer|min:1',
        ]);

        $venta = Venta::with('cliente')->findOrFail($request->venta_id);

        $entrega = Entrega::create([
            'venta_id' => $venta->id,
            'cliente_id' => $venta->cliente_id,
            'bodega_id' => $request->bodega_id,
            'fechaEntrega' => $request->fechaEntrega,
            'estado' => $request->estado,
            'cantidad' => $request->cantidad
        ]);
        
        return response()->json(['message' => 'Entrega registrada correctamente.', 'entrega' => $entrega]);
    }

    public function marcarComoEntregada($id)
    {
        $entrega = Entrega::findOrFail($id);

        if ($entrega->estado === 'entregada') {
            return response()->json(['message' => 'La entrega ya fue marcada como entregada.'], 400);
        }

        $entrega->update([
            'estado' => 'entregada',
            'fecha_entrega' => now()
        ]);

        return response()->json(['message' => 'Entrega marcada como entregada.']);
    }
}
