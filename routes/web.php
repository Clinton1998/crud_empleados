<?php

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
    return redirect()->route('empleados.index');
});
Route::resource('empleados','EmpleadoController');

Route::get('empleados/foto/{fileName}', 'EmpleadoController@foto')->name('empleados.foto');

Route::get('empleados/search/{dni}','EmpleadoController@search');