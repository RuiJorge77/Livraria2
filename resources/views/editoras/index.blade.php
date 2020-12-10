@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$editoras->render()}}
@foreach($editoras as $editora)
<li>
<a href="{{route('editoras.show', ['ide'=>$editora->id_editora])}}">
    {{$editora->nome}}
</a></li>
@endforeach
</ul>
@if(auth()->check())
<a class="btn btn-primary" href="{{route('editoras.create')}}">
    Adicionar editora
</a>
@endif
@endsection