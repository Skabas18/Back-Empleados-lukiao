<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
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


Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados');
Route::post('/save_empleados', [EmpleadosController::class, 'save'])->name('save_empleados');
Route::get('/edit_empleados', [EmpleadosController::class, 'edit'])->name('edit_empleados');
Route::put('/update_empleados', [EmpleadosController::class, 'update'])->name('update_empleados');
Route::post('/delete_empleados', [EmpleadosController::class, 'delete'])->name('delete_empleados');

