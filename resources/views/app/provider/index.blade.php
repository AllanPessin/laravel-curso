<h3>Fornecedor</h3>

@php
// if() {

// } elseif() {

// } else {

// }
@endphp

{{-- @dd($providers) --}}

@if (count($providers) > 0 && count($providers) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>

    @elseif (count($providers) > 10)
        <h3>Existem varios fornecedores cadastrados</h3>

    @else
        <h3>Não existem fornecedores cadastrados</h3>
@endif

Fornecedor: {{ $providers[0]['name'] }}
<br />
Status: {{ $providers[0]['status'] }}

<br />
<br />

{{-- Executa se a condição for true --}}
@if (!$providers[0]['status'] == 's')
  Fornecedor inativo
@endif

{{-- Executa se a condição for false --}}
@unless ($providers[0]['status'] == 's')
  Fornecedor inativo
@endunless

{{-- Verifica se variável esta definida ou não --}}
@isset($providers)    
  Fornecedor: {{ $providers[1]['name'] }}
  <br />
  Status: {{ $providers[1]['status'] }}
  <br />
  @isset($providers[1]['cnpj'])
    CPNJ: {{ $providers[1]['cnpj'] }}      
  @endisset
@endisset

<br />
<br />

{{-- Testa se variável possui valor (retorna true se for vazia) --}}
@isset($providers)    
  Fornecedor: {{ $providers[0]['name'] }}
  <br />
  Status: {{ $providers[0]['status'] }}
  <br />
  @isset($providers[0]['cnpj'])
    CPNJ: {{ $providers[0]['cnpj'] }}
    @empty($providers[0]['cnpj'])
        - Vazio
    @endempty
  @endisset
@endisset

{{-- Operado ternário sintaxe blade --}}
@isset($providers)    
  Fornecedor: {{ $providers[1]['name'] }}
  <br />
  Status: {{ $providers[1]['status'] }}
  <br />
  CPNJ: {{ $providers[1]['cnpj'] ?? 'Dado não foi preenchido' }} {{-- Se a variável testado não estiver definida 
                                              ou se a variável possuir o valor null será 
                                              utilizado o valor default --}}  
@endisset

{{-- Sintaxe switch --}}
@isset($providers)    
  Fornecedor: {{ $providers[1]['name'] }}
  <br />
  Status: {{ $providers[1]['status'] }}
  <br />
  CPNJ: {{ $providers[1]['cnpj'] ?? '' }}  
  <br />
  Telefone: ({{ $providers[1]['ddd'] ?? '' }}) {{ $providers[1]['telefone'] ?? '' }}  
  @switch($providers[1]['ddd'])
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

<h3>For</h3>
{{-- Sintaxe de contador for blade --}}
@isset($providers)
  @for ($i = 0; isset($providers[$i]); $i++)
    Fornecedor: {{ $providers[$i]['name'] }}
    <br />
    Status: {{ $providers[$i]['status'] }}
    <br />
    CPNJ: {{ $providers[$i]['cnpj'] ?? '' }}  
    <br />
    Telefone: ({{ $providers[$i]['ddd'] ?? '' }}) {{ $providers[$i]['telefone'] ?? '' }}  
    <hr />
  @endfor
@endisset

<h3>While</h3>
{{-- Sintaxe while blade --}}
@isset($providers)
  @php $i = 0 @endphp

  @while(isset($providers[$i]))
    Fornecedor: {{ $providers[$i]['name'] }}
    <br />
    Status: {{ $providers[$i]['status'] }}
    <br />
    CPNJ: {{ $providers[$i]['cnpj'] ?? '' }}  
    <br />
    Telefone: ({{ $providers[$i]['ddd'] ?? '' }}) {{ $providers[$i]['telefone'] ?? '' }}  
    <hr />
    @php $i++ @endphp
  @endwhile
@endisset

<h3>Foreach</h3>
@isset($providers)
    @foreach ($providers as $index => $provider )
        Fornecedor: {{ $provider['name'] }}
        <br />
        Status: {{ $provider['status'] }}
        <br />
        CPNJ: {{ $provider['cnpj'] ?? '' }}  
        <br />
        Telefone: ({{ $provider['ddd'] ?? '' }}) {{ $provider['telefone'] ?? '' }}  
        <hr />
    @endforeach
@endisset

<h3>Forelse</h3>
@isset($providers)
    @forelse ($providers as $index => $provider )
        Fornecedor: {{ $provider['name'] }}
        <br />
        Status: {{ $provider['status'] }}
        <br />
        CPNJ: {{ $provider['cnpj'] ?? '' }}  
        <br />
        Telefone: ({{ $provider['ddd'] ?? '' }}) {{ $provider['telefone'] ?? '' }}  
        <hr />
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset

Escapar tag de impressão do blade
Fornecedores: @{{ $providers }} 

<h3>Forelse variavel $loop</h3>
@isset($providers)
    @forelse ($providers as $index => $provider )
        Iteração atual: {{ $loop->iteration }} 
        <br>
        Fornecedor: {{ $provider['name'] }}
        <br />
        Status: {{ $provider['status'] }}
        <br />
        CPNJ: {{ $provider['cnpj'] ?? '' }}  
        <br />
        Telefone: ({{ $provider['ddd'] ?? '' }}) {{ $provider['telefone'] ?? '' }}  
        <br />
        @if ($loop->first)
            Primeira iteração do loop
            <br>
        @endif
        @if ($loop->last)
            Última iteração do loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr />
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset