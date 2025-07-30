<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::resource('vendedores', VendedorController::class);
Route::resource('productos', ProductoController::class);
Route::resource('ventas', VentaController::class);
Route::resource('detalle-ventas', DetalleVentaController::class);
Route::resource('bodegas', BodegaController::class);
Route::resource('stock-productos', StockProductoController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('producto-proveedores', ProductoProveedorController::class);
Route::resource('entregas', EntregaController::class);
Route::resource('recursos-humanos', RecursosHumanosController::class);

Route::post('/recursos-humanos/autorizar-vendedor/{id}', [RecursosHumanosController::class, 'autorizarVendedor']);
Route::post('/entregas/registrar', [EntregaController::class, 'registrar']);
Route::post('/bodegas/reabastecer', [BodegaController::class, 'reabastecer']);
Route::get('/ventas/{id}/calcular-total', [VentaController::class, 'calcularTotal']);

