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
