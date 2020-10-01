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


//For guest middleware that tries to access /home
Route::get('/home', function() {
    return redirect('/');
}); 

//General route. Every user can access this page
Route::get('/', 'PagesController@getIndex');
Route::get('/pizza/detail/id/{id}', 'PagesController@getDetail');
Route::get('/find', 'PagesController@search')->name('search');

//Route below is for guest only (not accessible for member and/or admin) in other way this is for user who isn't authenticated yet
Route::middleware(['guest'])->group(function() {
    Route::get('/login', 'PagesController@GetLoginPage')->name('login')->middleware('guest');
    Route::post('/auth', 'AuthController@PostLoginCred')->name('auth');
    Route::get('/register', 'PagesController@GetRegisterPage');
    Route::post('/regist', 'AuthController@PostRegisterData')->name('regist');
});

//Route below is accessible for admin only. Not accessible for guest and/or member. If member or guest try to access this, then it'll redirect to login page
Route::middleware(['role:Admin', 'auth'])->group(function() {
    Route::get('/pizza/add', 'AddPizzaController@GetInsertPage');
    Route::post('/pizza/insert', 'AddPizzaController@Store')->name('insertPizza');
    Route::get('/users/all', 'PagesController@getAllUser');
    Route::get('/transaction/all', 'TransactionController@getAllTransaction');
});

//Route below is accessible for member only. If admin or guest try to access, then it'll redirect to login page
Route::middleware(['role:Member', 'auth'])->group(function(){
    Route::post('/addtocart/{id}', 'CartController@addToCart')->name('addToCart');
    Route::get('/cart', 'CartController@getCartItems');
    Route::get('/cart/delete/{id}', 'CartController@deleteCartItem');
    Route::post('/cart/update/{id}', 'CartController@updateCartItem')->name('updateCart');
    Route::get('/checkout/{userId}', 'CartController@Checkout');
    Route::get('/transaction', 'TransactionController@userTransaction');
});

//Route for authenticated user only.
Route::get('/logout', 'AuthController@logout')->middleware('auth');

