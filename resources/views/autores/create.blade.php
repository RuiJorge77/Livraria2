<form action="{{route('autores.store')}}" method="post">
@csrf
    nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
    @if($errors->has('nome') )
        deverá indicar um nome correto
        <br>
    @endif
    nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br>
    @if($errors->has('nacionalidade') )
        deverá indicar uma nacionalidade correta
        <br>
    @endif
    data nascimento: <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br>
    @if($errors->has('data_nascimento') )
        deverá indicar uma data de nascimento correta
        <br>
    @endif
    fotografia: <input type="test" name="fotografia" value="{{old('fotografia')}}"><br>
    @if($errors->has('fotografia') )
        deverá indicar uma fotografia correta
        <br>
    @endif
    <input type="submit" value="enviar">    
</form>