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

Route::get('/', function () {
    $pizzas = Pizza::paginate(6);
    return view('index', ['pizzas' => $pizzas]);
});

Route::get('/find', function(Request $request) {
    dd($request->all());
})->name('search');

Route::get('/login', 'LoginController@GetLoginPage');
Route::post('/auth', 'LoginController@PostLoginCred')->name('auth');
Route::get('/register', 'RegisterController@GetRegisterPage');
Route::post('/regist', 'RegisterController@PostRegisterData')->name('regist');

Route::get('/pizza/add', 'AddPizzaController@GetInsertPage');

Route::post('/pizza/insert', 'AddPizzaController@Store')->name('insertPizza');