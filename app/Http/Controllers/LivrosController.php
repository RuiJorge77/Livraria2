<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;
use Auth;

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
        return view('livros.create', ['generos'=>$generos, 'autores'=>$autores, 'editoras' =>$editoras]);
        
    }
    
    public function store(Request $request){
        //$novolivro = $request->all();
        //dd($novolivro);
        
        $novoLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['image','nullable','max:2000'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            'pdf'=>['file','nullable', 'mimes:pdf', 'max:2000'],
        ]);
        
        if($request->hasFile('imagem_capa')){
            $nomeimagem = $request->file('imagem_capa')->getClientOriginalName();
            
            $nomeimagem = time().'_'. $nomeimagem;
            $guardarimagem = $request->file('imagem_capa')->storeAs('imagens/livros', $nomeimagem);
            
            $novoLivro['imagem_capa'] = $nomeimagem;
        }
        
        if(Auth::check()){
            $userAtual = Auth::user()->id;
            $novoLivro['id_user']=$userAtual; 
        }
        $autores = $request->id_autor;
        $editoras = $request->id_editora;
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);
        if(Gate::allows('admin')){
            return redirect()->route('livros.show', ['id'=>$livro->id_livro]);
        }
        else{
            return redirect()->route('livros.index');
        }
    }
    public function edit (Request $request){
        $id = $request->id;
        $generos = Genero::all();
        $autores = Autor::all();
        $editoras=Editora::all();
        $livro = livro::where('id_livro',$id)->with(['genero','autores','editoras'])->first();
        $autoresLivros = [];
        //obter id_autor dos autores deste livro
        foreach($livro->autores as $autor){
            $autoresLivros[] = $autor->id_autor;
        }
        $editorasLivro= [];
        foreach($livro->editoras as $editora){
            $editorasLivro[]=$editora->id_editora;
        }
        if(Gate::allows('atualizar-livro',$livro)||Gate::allows('admin')){
            if(isset($livro->user->id_user))
                if(auth()->user()->id == $livro->id_user){
                    return view('livros.edit', ['livro'=>$livro, 'generos' =>$genero, 'autores'=>$autores, 'autoresLivro'=>$autoresLivros, 'editoras'=>$editoras, 'editorasLivro'=>$editorasLivro]);
        }
        else{
            return view('index');
        }
        else{ 
            return view('livros.edit',['livro'=>$livro, 'generos'=>$generos, 'autores'=>$autores, 'autoresLivro'=>$autoresLivros, 'editoras'=>$editoras, 'editorasLivro'=>$editorasLivro]);
            }
            }
            else{
                return redirect()->route(livros.index)->with('mensagem','Nao tem premissao para aceder a area protegida');
            }
    }
    
    public function update (Request $request){
        $id = $request->id;
        $livro = livro::findOrFail($id);
        $imagemAntiga = $livro->imagem_capa;
        $updateLivro = $request->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['nullable', 'min:3', 'max:10'],
            'total_pagina'=>['nullable','numeric', 'min:1'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['image','nullable','max:2000'],
            'id_genero'=>['numeric', 'min:1', 'max:100'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
            'pdf'=>['file','nullable', 'mimes:pdf', 'max:2000'],
            ]);
        if($request->hasFile('imagem_capa')){
            $nomeimagem = $request->file('imagem_capa')->getClientOriginalName();
            
            $nomeimagem = time().'_'. $nomeimagem;
            $guardarimagem = $request->file('imagem_capa')->storeAs('imagens/livros', $nomeimagem);
            
            if(!is_null($imagemAntiga)){
                Storage::Delete("imagens/livros/". $imagemAntiga);
            }
            
            $updateLivro['imagem_capa'] = $nomeimagem;
        }
        
        if($request->hasFile('pdf')){
            $nomeimagem = $request->file('pdf')->getClientOriginalName();
            
            $nomeimagem = time().'_'. $nomeimagem;
            $guardarimagem = $request->file('pdf')->storeAs('imagens/livros', $nomeimagem);
            
            if(!is_null($imagemAntiga)){
                Storage::Delete("imagens/livros/". $imagemAntiga);
            }
            
            $updateLivro['imagem_capa'] = $nomeimagem;
        }
        $autores = $request -> id_autor;
        $editoras = $request -> id_editora;
        $livro->update($updateLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);
        
        //dd($updateLivro);
            
        
        if(Gate::allows('admin')){
            return redirect()->route('livros.show', ['id'=>$livro->id_livro]);
        }
        else{
            return redirect()->route('livros.index');
        }
    }
    
    public function delete (Request $request){
        $livro = Livro::where('id_livro',$request->id)->with(['genero','autores','editoras'])->first();
        if(isset($livro->users->id_user)){
            if(Auth::user()->id == $livro->users->id_user){
                if(is_null($livro)){
                    return redirect()->route('livros.index')->with('msg','O livro não existe');
                }
                else{
                    return view('livros.delete',['livro'=>$livro]);
                }
            }
            else{
                return view('livros.index');
            }
        }
        else{
            if(is_null($livro)){
                return redirect()->route('livros.index')->with('msg','O livro não existe');
            }
            else{
                return view('livros.delete',['livro'=>$livro]);
            }
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
        if(Gate::allows('admin')){
            return redirect()->route('livros.index')->with('mensagem', 'livro eliminado');
        }
        else{
            return redirect()->route('livros.index');
        }
    }
    
    public function comentarios (request $request){
        $idlivro = $request->id_livro;
        $livro = livro::findOrFail($idlivro);
        $comentario = $request->validate([
            'comentario'=>['required', 'min:3', 'max:255'],
        ]);
    }
    
}