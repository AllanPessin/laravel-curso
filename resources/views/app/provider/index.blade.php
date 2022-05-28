<h3>Fornecedor</h3>

@php
// if() {

// } elseif() {

// } else {

// }
@endphp

{{-- @dd($provider) --}}

@if (count($provider) > 0 && count($provider) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>

    @elseif (count($provider) > 10)
        <h3>Existem varios fornecedores cadastrados</h3>

    @else
        <h3>Não existem fornecedores cadastrados</h3>
@endif

Fornecedor: {{ $provider[0]['name'] }}
<br />
Status: {{ $provider[0]['status'] }}

<br />
<br />

{{-- Executa se a condição for true --}}
@if (!$provider[0]['status'] == 's')
  Fornecedor inativo
@endif

{{-- Executa se a condição for false --}}
@unless ($provider[0]['status'] == 's')
  Fornecedor inativo
@endunless

{{-- Verifica se variável esta definida ou não --}}
@isset($provider)    
  Fornecedor: {{ $provider[1]['name'] }}
  <br />
  Status: {{ $provider[1]['status'] }}
  <br />
  @isset($provider[1]['cnpj'])
    CPNJ: {{ $provider[1]['cnpj'] }}      
  @endisset
@endisset