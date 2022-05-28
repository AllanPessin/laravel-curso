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

<br />
<br />

{{-- Testa se variável possui valor (retorna true se for vazia) --}}
@isset($provider)    
  Fornecedor: {{ $provider[0]['name'] }}
  <br />
  Status: {{ $provider[0]['status'] }}
  <br />
  @isset($provider[0]['cnpj'])
    CPNJ: {{ $provider[0]['cnpj'] }}
    @empty($provider[0]['cnpj'])
        - Vazio
    @endempty
  @endisset
@endisset

{{-- Operado ternário sintaxe blade --}}
@isset($provider)    
  Fornecedor: {{ $provider[1]['name'] }}
  <br />
  Status: {{ $provider[1]['status'] }}
  <br />
  CPNJ: {{ $provider[1]['cnpj'] ?? 'Dado não foi preenchido' }} {{-- Se a variável testado não estiver definida 
                                              ou se a variável possuir o valor null será 
                                              utilizado o valor default --}}  
@endisset

{{-- Sintaxe switch --}}
@isset($provider)    
  Fornecedor: {{ $provider[1]['name'] }}
  <br />
  Status: {{ $provider[1]['status'] }}
  <br />
  CPNJ: {{ $provider[1]['cnpj'] ?? '' }}  
  <br />
  Telefone: ({{ $provider[1]['ddd'] ?? '' }}) {{ $provider[1]['telefone'] ?? '' }}  
  @switch($provider[1]['ddd'])
      @case('11')
          São Paulo (SP)
          @break
      @case('85')
          Juiz de Fora (MG)
          @break
      @case('32')
          Fortaleza (CE)
          @break
      @default
         Estado não identificado 
  @endswitch
@endisset

{{-- Sintaxe de contador for blade --}}
@isset($provider)
  @for ($i = 0; isset($provider[$i]); $i++)
    Fornecedor: {{ $provider[$i]['name'] }}
    <br />
    Status: {{ $provider[$i]['status'] }}
    <br />
    CPNJ: {{ $provider[$i]['cnpj'] ?? '' }}  
    <br />
    Telefone: ({{ $provider[$i]['ddd'] ?? '' }}) {{ $provider[$i]['telefone'] ?? '' }}  
    <hr />
  @endfor
@endisset

<br />
<br />

{{-- Sintaxe while blade --}}
@isset($provider)
  @php $i = 0 @endphp

  @while(isset($provider[$i]))
    Fornecedor: {{ $provider[$i]['name'] }}
    <br />
    Status: {{ $provider[$i]['status'] }}
    <br />
    CPNJ: {{ $provider[$i]['cnpj'] ?? '' }}  
    <br />
    Telefone: ({{ $provider[$i]['ddd'] ?? '' }}) {{ $provider[$i]['telefone'] ?? '' }}  
    <hr />
    @php $i++ @endphp
  @endwhile
@endisset
    