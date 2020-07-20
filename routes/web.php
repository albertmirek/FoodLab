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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/meals', 'MealsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/', function (){
//
//    if(Auth::check()){
//
//        return 'the user is logged in';
//    }
//
////    $username = 'sada';
////    $password ='dasda';
//
////    if (Auth::attempt(['username'=>$username, 'password'=>$password])){
////        return redirect()->intended('/admin');
////    }
//
//});


//Route::get('/admin/user/roles', ['middleware'=>'role', function (){
//
//    return 'Middleware role';
//}]);


Route::get('/admin', 'AdminsController@index')->name('admin.index');
