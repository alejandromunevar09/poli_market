<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoProveedorController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RecursosHumanosController;
use App\Http\Controllers\StockProductoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;
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
Route::get('/ventas/{id}/calcular-total', [VentaController::class, 'calcularTotal']);

// --- Ventas ---
Route::post('/ventas/registrar', [VentaController::class, 'registrarVenta'])->name('ventas.registrar');

// --- Entregas ---
Route::post('/entregas/{id}/marcar-como-entregada', [EntregaController::class, 'marcarComoEntregada'])->name('entregas.marcar');
Route::post('/entregas/registrar', [EntregaController::class, 'registrar']);

// --- Bodegas ---
Route::post('/bodegas/reabastecer', [BodegaController::class, 'reabastecer']);
Route::post('/bodegas/registrar-salida', [BodegaController::class, 'registrarSalida'])->name('bodegas.registrarSalida');
Route::get('/bodegas/{productoId}/{bodegaId}', [BodegaController::class, 'consultarStock'])->name('bodegas.consultar');
