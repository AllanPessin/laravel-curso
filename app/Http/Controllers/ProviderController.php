<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index() {
      $provider = [
        0 => [
          'name' => 'Fornecedor 1', 
          'status' => 'n',
          'cnpj' => '0'
        ],
        1 => [
          'name' => 'Fornecedor 2', 
          'status' => 's',
        ],
      ];
      
      $msg = isset($provider[0]['cnpj']) ? 'CPNJ informado' : 'CPNJ não informado';

      echo $msg;

      return view('app.provider.index', compact('provider'));
    }
}
