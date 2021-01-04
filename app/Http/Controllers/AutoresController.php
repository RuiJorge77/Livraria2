<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;
use App\Models\Autor;
use Auth;

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
        if(Gate::allows('admin')){
            return view('autores.create');
        }
        else {
            return redirect()->route(livros.index)->with('mensagem','Nao tem premissao para aceder a area protegida');
        }
    }
    
    public function store(Request $request){
         if(Gate::allows('admin')){
            //$novoautor = $request->all();
            //dd ($novoautor);
            $novoAutor = $request->validate([
                'nome'=>['required', 'min:3', 'max:100'],
                'nacionalidade'=>['required', 'min:3', 'max:100'],
                'data_nascimento'=>['required', 'min:3', 'max:100'],
                'fotografia'=>['nullable', 'min:1', 'max:100'],
            ]);
            $autor = Autor::create($novoAutor);
            if(Gate::allows('admin')){
                return redirect()->route('autores.show', ['ida'=>$autor->id_autor]);
            }
            else{
                return redirect()->route('livros.index');
            }
         }
    }
    
    public function edit (Request $request){
         if(Gate::allows('admin')){
            $id = $request->id;
            $autor = autor::where('id_autor', $id)->first();
            return view('autores.edit', [
               'autor'=>$autor 
            ]);
         }
    }
    
    public function update (Request $request){
         if(Gate::allows('admin')){
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
    
    public function delete (Request $request){
         if(Gate::allows('admin')){
            $autor = autor::where('id_autor', $request->id)->first();
            if(is_null($autor)) 
            {
                return redirect()->route('autores.index')->with('mensagem', 'A autor nao existe');
            }
            else
            {
                return view('autores.delete', ['autor'=>$autor]);
            }
         }
    }
    
    public function destroy (Request $request){
         if(Gate::allows('admin')){
            $idautor = $request->id;
            $autor = autor::findOrFail($idautor);
            $autor->delete();
            return redirect()->route('autores.index')->with('mensagem', 'Autor eliminado');
        }
    }
}