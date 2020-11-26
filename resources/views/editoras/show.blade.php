@extends('layout')
<ul>
IDE:{{$editora->id_editora}}<br>
Nome:{{$editora->nome}}<br>
Morada:{{$editora->morada}}<br>
Observacoes:{{$editora->observacoes}}<br>

@if(count($editora->livros))
        @foreach($editora->livros as $livro)
            {{$livro->titulo}}<br>
        @endforeach
@else  
    <div class="alert alert-danger" role="alert">
        Nesta editora ainda não há livros!
    </div>
@endif

Created_at:{{$editora->created_at}}<br>
Updated_at:{{$editora->updated_at}}<br>
Deleted_at:{{$editora->deleted_at}}
</ul>