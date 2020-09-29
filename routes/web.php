<?php

use App\Pizza;
use Illuminate\Http\Request;
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

Route::get('/', 'PagesController@getIndex');
Route::get('/pizza/detail/id/{id}', 'PagesController@getDetail');
Route::get('/find', 'PagesController@search')->name('search');

Route::get('/login', 'PagesController@GetLoginPage')->name('login');
Route::post('/auth', 'AuthController@PostLoginCred')->name('auth');
Route::get('/register', 'PagesController@GetRegisterPage');
Route::post('/regist', 'AuthController@PostRegisterData')->name('regist');

Route::middleware(['role:Admin', 'auth'])->group(function() {
    Route::get('/pizza/add', 'AddPizzaController@GetInsertPage');
    Route::post('/pizza/insert', 'AddPizzaController@Store')->name('insertPizza');
});

Route::middleware(['role:Member', 'auth'])->group(function(){
    Route::post('/addtocart/{id}', 'CartController@addToCart')->name('addToCart');
});


Route::get('/logout', 'AuthController@logout')->middleware('auth');

