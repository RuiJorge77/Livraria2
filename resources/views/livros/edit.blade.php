<form action="{{route('livros.update', ['id'=>$livro->id_livro])}}" method="post">
@method('patch')
@csrf
    titulo: <input type="text" name="titulo" value="{{$livro->titulo}}"><br>
    @if($errors->has('titulo') )
        deverá indicar um titulo correto
        <br>
    @endif
    idioma: <input type="text" name="idioma" value="{{$livro->idioma}}"><br>
    @if($errors->has('idioma') )
        deverá indicar um idioma correto
        <br>
    @endif
    Total páginas: <input type="text" name="total_paginas" value="{{$livro->total_paginas}}"><br>
    @if($errors->has('total_paginas') )
        deverá indicar um NºPáginas correto
        <br>
    @endif
    Data Edição: <input type="date" name="data_edicao" value="{{$livro->data_edicao}}"><br>
    @if($errors->has('data_edicao') )
        deverá indicar uma data de edição correta
        <br>
    @endif
    ISBN: <input type="text" name="isbn" value="{{$livro->isbn}}"><br>
    @if($errors->has('isbn') )
        deverá indicar um isbn correto(13 carateres)
        <br>
    @endif
    Observações: <input type="text" name="observacoes" value="{{$livro->observacoes}}"><br>
    @if($errors->has('observacoes') )
        deverá indicar uma observacao correta
        <br>
    @endif
    Imagem Capa: <input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}"><br>
    @if($errors->has('imagem_capa') )
        deverá indicar uma imagem de capa correta
        <br>
    @endif
    Género: <input type="text" name="id_genero" value="{{$livro->id_genero}}"><br>
    @if($errors->has('id_genero') )
        deverá indicar um genero correto
        <br>
    @endif
    Autor: <input type="text" name="id_autor" value="{{$livro->id_autor}}"><br>
    @if($errors->has('id_autor') )
        deverá indicar um autor correto
        <br>
    @endif
    Sinopse: <input type="text" name="sinopse" value="{{$livro->sinopse}}"><br>
    @if($errors->has('sinopse') )
        deverá indicar uma sinopse correta
        <br>
    @endif
    <input type="submit" value="enviar">    
</form>