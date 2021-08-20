@extends('admin.layouts.app')

@section('tilte', 'Gestão de Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @if ($teste === '123')
        É igual
    @elseif($teste == 123)
        É igual a 123
    @else 
        É diferente
    @endif

    @unless ($teste === '123')
        sgdfgdf
    @else
        fsdgdfg
    @endunless

    @isset($teste1)
        <p>{{$teste1}}</p>
    @endisset

@endsection

