<form action="{{route('generos.store')}}" method="post">
@csrf
    designacao: <input type="text" name="designacao" value="{{old('designacao')}}"><br>
    @if($errors->has('designacao') )
        deverá indicar um designacao correto
        <br>
    @endif
    observacoes: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br>
    @if($errors->has('observacoes') )
        deverá indicar uma observacoes correta
        <br>
    @endif
    <input type="submit" value="enviar">    
</form>