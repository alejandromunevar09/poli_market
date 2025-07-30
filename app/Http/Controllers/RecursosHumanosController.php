<?php

namespace App\Http\Controllers;

use App\Models\RecursosHumanos;
use Illuminate\Http\Request;

class RecursosHumanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursoshumanos = RecursosHumanos::all();
        return view('recursoshumanos.index', compact('recursoshumanos'));
    }

    public function autorizar()
    {
        return view('recursoshumanos.autorizarVendedor');
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

    public function autorizarVendedor(Request $request, $vendedorId)
    {
        $vendedor = Vendedor::findOrFail($vendedorId);
        $vendedor->autorizado = true;
        $vendedor->save();

        return response()->json(['message' => 'Vendedor autorizado correctamente.']);
    }
}
