<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;

class LivrosController extends Controller
{
    //
    
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros= Livro::paginate(4);
        return view('livros.index',[
            'livros'=>$livros
        ]);
    }
    
    public function show(Request $request){
        $idLivro = $request->id;
        //$livro=Livro::findOrFail($idLivro);
        //$livro=Livro::find($idLivro);
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();
        return view('livros.show',[
            'livro'=>$livro
        ]);
    }
    public function create(){
        $autores = Autor::all();
        $editoras = Editora::all();
        $generos = genero::all();
        return view('livros.create', [
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras' =>$editoras
        ]);
        
    }
    
    public function store(Request $request){
        //$novolivro = $request->all();
        //dd ($novolivro);
        if(Auth::check()){
            $userAtual = Auth::user()->id;
            $livro['id_user']=$userAtual; 
        }
        $novoLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        $autores = $request->id_autor;
        $editoras = $request->id_editora;
        
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);
        return redirect()->route('livros.show', [
           'id'=>$livro->id_livro 
        ]);
    }
    public function edit (Request $request){
        $id = $request->id;        
        $autores = Autor::all();
        $editoras = Editora::all();
        $generos = genero::all();
        $livro = livro::where('id_livro', $id)->with('autores', 'editoras')->first();
        $autoresLivro = [];
        $editorasLivro = [];
        //obter id_autor dos autores deste livro
        foreach($livro->autores as $autor){
            $autoresLivro[] = $autor->id_autor;
        }
        
        foreach($livro->editoras as $editora){
            $editorasLivro[] = $editora->id_editora;
        }
        
        return view('livros.edit', [
            'livro'=>$livro, 
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras,
            'editorasLivro'=>$editorasLivro,
            'autoresLivro'=>$autoresLivro,
        ]);
        
    }
    
    public function update (Request $request){
        $id = $request->id;
        $livro = livro::findOrFail($id);
        $updateLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            ]);
        $autores = $request -> id_autor;
        $editoras = $request -> id_editora;
        $livro->update($updateLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);
        return redirect()->route('livros.show', [
           'id'=>$livro->id_livro 
        ]);
    }
    
    public function delete (Request $request){
        $livro = livro::where('id_livro', $request->id)->first();
        if(is_null($livro)) 
        {
            return redirect()->route('livros.index')->with('mensagem', 'O livro nao existe');
        }
        else
        {
            return view('livros.delete', ['livro'=>$livro]);
        }
    }
    
    public function destroy (Request $request){
        $idlivro = $request->id;
        
        $livro = livro::findOrFail($idlivro);
        $autoresLivro = Livro::findOrFail($idlivro)->autores;
        $editorasLivro = Livro::findOrFail($idlivro)->editoras;
        $livro->autores()->detach($autoresLivro);
        $livro->editoras()->detach($editorasLivro);
        $livro->delete();
        return redirect()->route('livros.index')->with('mensagem', 'livro eliminado');
    }
}