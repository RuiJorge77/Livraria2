<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        //$generos = Genero::all()->sortbydesc('idl');
        $generos= Genero::paginate(4);
        return view('generos.index',[
            'generos'=>$generos
        ]);
    }
    public function show(Request $request){
        $idgenero = $request->idg;
        //$genero=Genero::findOrFail($idgenero);
        //$genero=Genero::find($idgenero);
        $genero=Genero::where('id_genero',$idgenero)->with('livros')->first();
        return view('generos.show',[
            'genero'=>$genero
        ]);
    }
    public function create(){
         if(Gate::allows('admin')){
            return view('generos.create');
         }
    }
    
    public function store(Request $request){
         if(Gate::allows('admin')){
            //$novogenero = $request->all();
            //dd ($novogenero);
            $novoGenero = $request->validate([
                'designacao'=>['required', 'min:3', 'max:100'],
                'observacoes'=>['nullable', 'min:1', 'max:100'],
            ]);
            $genero = Genero::create($novoGenero);

            return redirect()->route('generos.show', [
               'idg'=>$genero->id_genero 
            ]);
         }
    }
    
    public function edit (Request $request){
         if(Gate::allows('admin')){
            $id = $request->id;
            $genero = genero::where('id_genero', $id)->first();
            return view('generos.edit', [
               'genero'=>$genero 
            ]);
         }
    }
    
    public function update (Request $request){
         if(Gate::allows('admin')){
            $id = $request->$id;
            $genero = genero::findOrFail(id);
            $updateGenero = $request->validate([
                'designacao'=>['required', 'min:3', 'max:100'],
                'observacoes'=>['nullable', 'min:1', 'max:100'],
                ]);
            $genero->update($atualizarGenero);

            return redirect()->route('generos.show', [
               'id'=>$genero->id_genero 
            ]);
         }
    }
    
    public function delete (Request $request){
             if(Gate::allows('admin')){
            $genero = genero::where('id_genero', $request->id)->first();
            if(is_null($genero)) 
            {
                return redirect()->route('generos.index')->with('mensagem', 'O Género nao existe');
            }
            else
            {
                return view('generos.delete', ['genero'=>$genero]);
            }
        }
    }
    
    public function destroy (Request $request){
         if(Gate::allows('admin')){
            $idgenero = $request->id;
            $genero = genero::findOrFail($idgenero);
            $genero->delete();
            return redirect()->route('generos.index')->with('mensagem', 'genero eliminado');
         }
        }
}