<form action="{{route('generos.update', ['id'=>$genero->id_genero])}}" method="post">
@method('patch')
@csrf
    designacao: <input type="text" name="designacao" value="{{$genero->designacao}}"><br>
    @if($errors->has('designacao') )
        deverá indicar um designacao correto
        <br>
    @endif
    observacoes: <input type="text" name="observacoes" value="{{$genero->observacoes}}"><br>
    @if($errors->has('observacoes') )
        deverá indicar uma observacoes correta
        <br>
    @endif
    <input type="submit" value="enviar">    
</form>