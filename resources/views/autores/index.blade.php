@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>
<a href="{{route('autores.show', ['ida'=>$autor->id_autor])}}">
    {{$autor->nome}}
</a></li>
@endforeach
</ul>
@if(auth()->check())
<a class="btn btn-primary" href="{{route('autores.create')}}">
    Adicionar editora
</a>
@endif
@endsection