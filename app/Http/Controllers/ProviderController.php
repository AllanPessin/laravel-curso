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
          'cnpj' => '0',
          'ddd' => '11',
          'telefone' => '90000-0000'
        ],
        1 => [
          'name' => 'Fornecedor 2', 
          'status' => 's',
          'cnpj' => null,
          'ddd' => '85',
          'telefone' => '90000-0000'
        ],
        2 => [
          'name' => 'Fornecedor 3', 
          'status' => 's',
          'cnpj' => null,
          'ddd' => '32',
          'telefone' => '90000-0000'
        ],
      ];
      
      $msg = isset($provider[0]['cnpj']) ? 'CPNJ informado' : 'CPNJ não informado';

      echo $msg;

      return view('app.provider.index', compact('provider'));
    }
}
