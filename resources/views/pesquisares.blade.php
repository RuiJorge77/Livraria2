@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
@foreach($resultado as $res)
    <a href="{{route('livros.show', ['id'=>$res->id_livro])}}">
    <h4>Livros com esse nome: {{$res->titulo}}</h4>
    </a>
    <br>
@endforeach
@endsection