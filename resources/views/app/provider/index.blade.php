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

{{-- Executa se a condição for true --}}
@if (!$provider[0]['status'] == 's')
  Fornecedor inativo
@endif

{{-- Executa se a condição for false --}}
@unless ($provider[0]['status'] == 's')
  Fornecedor inativo
@endunless
