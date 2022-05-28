<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index() {
      $provider = [
        'Fornecedor 1',
        'Fornecedor 2',
        'Fornecedor 3',
      ];
      
      return view('app.provider.index', compact('provider'));
    }
}
