@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$livros->render()}}
@foreach($livros as $livro)
<li>
<a href="{{route('livros.show', ['id'=>$livro->id_livro])}}">
    {{$livro->titulo}}
</a>
</li>
@endforeach
</ul>
@if(auth()->check())
<a class="btn btn-primary" href="{{route('livros.create')}}">
    Adicionar Livro
</a>
@endif
@endsection
