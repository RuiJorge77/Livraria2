<form action="{{route('editoras.store')}}" method="post">
@csrf
    nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
    @if($errors->has('nome') )
        deverá indicar um nome correto
        <br>
    @endif
    morada: <input type="text" name="morada" value="{{old('morada')}}"><br>
    @if($errors->has('morada') )
        deverá indicar uma morada correta
        <br>
    @endif
    observacoes: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br>
    @if($errors->has('observacoes') )
        deverá indicar uma observação correta
        <br>
    @endif
    <input type="submit" value="enviar">    
</form>