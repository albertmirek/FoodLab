<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();


Route::resource('/meals', 'MealsController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function (){

    Route::get('/admin', 'AdminsController@index')->name('admin.index');

    Route::post('/home/orders', 'HomeController@createOrder')->name('orders.create');

    //Route::get('/home/{week}', 'HomeController@nextWeek')->name('home.next');

    Route::get('/admin/meals', 'MealsController@index')->name('meal.index');
    Route::get('/admin/meals/create', 'MealsController@create')->name('meal.create');
    Route::get('/admin/meals/{meal}/edit', 'MealsController@edit')->name('meal.edit');
    Route::delete('/admin/meals/{meal}/delete', 'MealsController@destroy')->name('meal.destroy');
    Route::post('/admin/meals', 'MealsController@store')->name('meal.store');
    Route::patch('/admin/meals/{meal}/update', 'MealsController@update')->name('meal.update');


    Route::get('/admin/menus', 'MenusController@index')->name('menu.index');
    Route::get('/admin/menus/create', 'MenusController@create')->name('menu.create');
    Route::post('/admin/menus', 'MenusController@store')->name('menu.store');

});

