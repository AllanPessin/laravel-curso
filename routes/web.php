<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'main']);

Route::get('/sobre-nos', [AboutController::class, 'about'])->name('about');

Route::get('/contato', [ContactController::class, 'contact'])->name('contact');

Route::get('/login', function() { return 'Login';})->name('login');

Route::prefix('/app')->group(function() {
  Route::get('/cliente', function() { return 'cliente';})->name('client');
  Route::get('/fonecedores', function() { return 'fonecedores';})->name('provider');
  Route::get('/produtos', function() { return 'produtos';})->name('products');
});
