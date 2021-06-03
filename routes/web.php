L<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RepartidoresController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CatalogosController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/repartidores/create', [RepartidoresController::class, 'create'])->name('repartidores.create');
Route::post('/repartidores/store', [RepartidoresController::class, 'store'])->name('repartidores.store');
Route::get('/repartidores', [RepartidoresController::class, 'index'])->name('repartidores.index');
Route::get('/repartidores/show/{repartidor}', [RepartidoresController::class, 'show'])->name('repartidores.show');
Route::get('/repartidores/edit/{repartidor}', [RepartidoresController::class, 'edit'])->name('repartidores.edit');
Route::put('/repartidores/update/{repartidor}', [RepartidoresController::class, 'update'])->name('repartidores.update');
Route::delete('/repartidores/destroy/{repartidor}', [RepartidoresController::class, 'destroy'])->name('repartidores.destroy');

Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/show/{cliente}', [ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/edit/{cliente}', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/destroy/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

