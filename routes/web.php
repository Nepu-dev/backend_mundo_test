<?php

use App\Http\Controllers\MarcasController;
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

Route::get('/marcas', [MarcasController::class, 'listarMarcas']);
Route::get('/bodegas', [MarcasController::class, 'listarBodegas']);
Route::get('/modelos/{id_marca}', [MarcasController::class, 'listarModelos']);
Route::get('/dispositivos/{id_bodega}', [MarcasController::class, 'listarDispositivos']);
Route::get('/dispositivos-filter/{id_modelo}/{id_marca}/{id_bodega}', [MarcasController::class, 'listarDispositivosFilter']);

