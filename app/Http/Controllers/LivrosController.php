<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

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
        return view('livros.create');
    }
    
    public function store(Request $request){
        //$novolivro = $request->all();
        //dd ($novolivro);
        $novoLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'id_autor'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        $livro = Livro::create($novoLivro);
        
        return redirect()->route('livros.show', [
           'id'=>$livro->id_livro 
        ]);
    }
    public function edit (Request $request){
        $id = $request->id;
        $livro = livro::where('id_livro', $id)->first();
        return view('livros.edit', [
           'livro'=>$livro 
        ]);
    }
    
    public function update (Request $request){
        $id = $request->$id;
        $livro = livro::findOrFail(id);
        $updateLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'id_autor'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            ]);
        $livro->update($atualizarLivro);
        
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
        $livro->delete();
        return redirect()->route('livros.index')->with('mensagem', 'livro eliminado');
    }
}