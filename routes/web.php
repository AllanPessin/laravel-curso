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

Route::get('/contato', [ContactController::class, 'contact'])->name('contact');

Route::get('/sobre-nos', [AboutController::class, 'about'])->name('about');

//nome, categoria, assunto, mensagem
Route::get('/contato/{nome}/{categoria_id}', 
  function (
    string $nome = 'Desconhecido', 
    int $categoria_id = 1,
    ) {
      echo "Estamos aqui: $nome - Motivo do contato: $categoria_id";
  }
)
  ->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+')
  ->name('contact.message');