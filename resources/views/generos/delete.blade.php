<h2>Deseja eliminar o Género?</h2>
<h2>{{$genero->designacao}}</h2>
<form method="post" action="{{route('generos.destroy', ['id'=>$genero->id_genero])}}" >
@csrf
@method('delete')
<input type="submit" value="enviar">
<input type="button">
</form>