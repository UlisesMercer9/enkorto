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

Route::get('/','FrontController@index');
Route::get('servicios','servicesController@index')->name('servicios');
Route::get('hospedaje','servicesController@hospedaje')->name('hospedaje');
Route::get('moda','servicesController@moda')->name('moda');
Route::get('salud','servicesController@salud')->name('salud');
Route::get('educacion','servicesController@educacion')->name('educacion');
Route::get('alimentos','servicesController@alimentos')->name('alimentos');
Route::get('artesanias','servicesController@artesanias')->name('artesanias');
Route::get('mascotas','servicesController@mascotas')->name('mascotas');
Route::get('oficios','servicesController@oficios')->name('oficios');
Route::get('entretenimiento','servicesController@entretenimiento')->name('entretenimiento');
Route::get('oficinas','servicesController@oficinas')->name('oficinas');
Route::get('deportes','servicesController@deportes')->name('deportes');
Route::get('transporte','servicesController@transporte')->name('transporte');
Route::get('changarros','servicesController@changarros')->name('changarros');
Route::get('departamentos','servicesController@departamentos')->name('departamentos');
Route::get('carpinterias','servicesController@carpinterias')->name('carpinterias');
Route::get('emergencias','servicesController@emergencias')->name('emergencias');
Route::get('otros','servicesController@otros')->name('otros');


Route::resource('services','servicesController')->middleware('auth',['except' => 'index']);
Route::get('/admin','servicesController@admin')->name('admin')->middleware('auth');

Auth::routes(['register' => false, 'reset' => false]);

Route::resource('categorias','CategoriesController')->middleware('auth');
Route::get('categorias/edit/{id}', 'CategoriesController@edit')->middleware('auth');
Route::get('categorias/{id}', 'CategoriesControllerr@destroy')->middleware('auth');
