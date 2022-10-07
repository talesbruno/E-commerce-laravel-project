@extends('layouts.header')

@section('titulo', 'dashboard')

@section('conteudo')

<div>
    <h1>Meus Locais</h1>
</div>
<div>
    @if(count($produtos)>0)
    @else
    <p>vc ainda tem tem locais cadastrado. <a href="/locais/criarlocal"></a></p>
    @endif
</div>

@endsection