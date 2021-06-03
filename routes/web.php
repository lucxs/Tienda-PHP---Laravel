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
use App\Http\Controllers\DashboardController;
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class, 'index'])
->name('dashboard');

#####CRUD Marcas########
use App\Http\Controllers\MarcaController;
Route::middleware(['auth:sanctum', 'verified'])->get('/adminMarcas',[MarcaController::class, 'index'])
->name('adminMarcas');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarMarca',[MarcaController::class, 'create'])
->name('agregarMarca');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregaMarca',[MarcaController::class, 'store'])
->name('agregaMarca');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarMarca/{id}',[MarcaController::class, 'edit'])
->name('modificarMarca');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificaMarca',[MarcaController::class, 'update'])
->name('modificaMarca');



#####CRUD Categorias####

Route::middleware(['auth:sanctum', 'verified'])->get('/adminCategorias',[MarcaController::class, 'index'])
->name('adminMarcas');

#####CRUD Productos####
use App\Http\Controllers\ProductoController;
Route::middleware(['auth:sanctum', 'verified'])->get('/adminProductos',[ProductoController::class, 'index'])
->name('adminProductos');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarProductos',[ProductoController::class, 'create'])
->name('agregarProducto');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarProducto/{id}',[ProductoController::class, 'create'])
->name('agregarProducto');



