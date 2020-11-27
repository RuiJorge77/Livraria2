<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutoresController extends Controller
{
    //
    public function index(){
        //$autores = Autor::all()->sortbydesc('idl');
        $autores= Autor::paginate(4);
        return view('autores.index',[
            'autores'=>$autores
        ]);
    }
    public function show(Request $request){
        $idAutores = $request->ida;
        //$autores=Autor::findOrFail($idAutores);
        //$autores=Autor::find($idAutores);
        $autores=Autor::where('id_autor',$idAutores)->with('livros')->first();
        return view('autores.show',[
            'autores'=>$autores
        ]);
    }
    public function create(){
        return view('autores.create');
    }
    
    public function store(Request $request){
        //$novoautor = $request->all();
        //dd ($novoautor);
        $novoAutor = $request->validate([
            'nome'=>['required', 'min:3', 'max:100'],
            'nacionalidade'=>['required', 'min:3', 'max:100'],
            'data_nascimento'=>['required', 'min:3', 'max:100'],
            'fotografia'=>['nullable', 'min:1', 'max:100'],
        ]);
        $autor = Autor::create($novoAutor);
        
        return redirect()->route('autores.show', [
           'ida'=>$autor->id_autor 
        ]);
    }
    
    public function edit (Request $request){
        $id = $request->id;
        $autor = autor::where('id_autor', $id)->first();
        return view('autores.edit', [
           'autor'=>$autor 
        ]);
    }
    
    public function update (Request $request){
        $id = $request->$id;
        $autor = autor::findOrFail(id);
        $updateAutor = $request->validate([
            'nome'=>['required', 'min:3', 'max:100'],
            'nacionalidade'=>['required', 'min:3', 'max:100'],
            'data_nascimento'=>['required', 'min:3', 'max:100'],
            'fotografia'=>['nullable', 'min:1', 'max:100'],
            ]);
        $autor->update($atualizarAutor);
        
        return redirect()->route('autores.show', [
           'id'=>$autor->id_autor 
        ]);
    }
}