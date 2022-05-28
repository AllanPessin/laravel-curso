<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

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

Route::get('/', [MainController::class, 'main'])->name('web.index');

Route::get('/sobre-nos', [AboutController::class, 'about'])->name('web.about');

Route::get('/contato', [ContactController::class, 'contact'])->name('web.contact');

Route::get('/login', function() { return 'Login';})->name('web.login');

Route::prefix('/app')->group(function() {
  Route::get('/cliente', function() { return 'cliente';})->name('app.client');
  Route::get('/fonecedores', function() { return 'fonecedores';})->name('app.provider');
  Route::get('/produtos', function() { return 'produtos';})->name('app.products');
});

Route::get('/rota1', function() {
  echo 'Rota 1';
})->name('web.rota1');

Route::get('/rota2', function() {
  return redirect()->route('web.rota1');
})->name('web.rota2');
// Route::redirect('/rota2', '/rota1');

Route::fallback(function() {
  echo 'A rota acessada não existe. <a href="'.route('web.index').'"> Voltar para a pagina inicial<a/>';
});
