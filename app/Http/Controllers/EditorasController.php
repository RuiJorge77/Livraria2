<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;
use App\Models\Editora;

class EditorasController extends Controller
{
    //
    public function index(){
        //$editoras = Editora::all()->sortbydesc('idl');
        $editoras= Editora::paginate(4);
        return view('editoras.index',[
            'editoras'=>$editoras
        ]);
    }
    public function show(Request $request){
        $idEditora = $request->ide;
        //$editora=Editora::findOrFail($idEditora);
        //$editora=Editora::find($idEditora);
        $editora=Editora::where('id_editora',$idEditora)->with('livros')->first();
        return view('editoras.show',[
            'editora'=>$editora
        ]);
    }
    
    public function create(){
         if(Gate::allows('admin')){
            return view('editoras.create');
         }
    }
    
    public function store(Request $request){
         if(Gate::allows('admin')){
            //$novoeditora = $request->all();
            //dd ($novoeditora);
            $novoEditora = $request->validate([
                'nome'=>['required', 'min:3', 'max:100'],
                'morada'=>['required', 'min:3', 'max:100'],
                'observacoes'=>['nullable', 'min:1', 'max:100'],
            ]);
            $editora = Editora::create($novoEditora);

            return redirect()->route('editoras.show', [
               'ide'=>$editora->id_editora 
            ]);
         }
    }
    
    public function edit (Request $request){
         if(Gate::allows('admin')){
            $id = $request->id;
            $editora = editora::where('id_editora', $id)->first();
            return view('editoras.edit', [
               'editora'=>$editora 
            ]);
         }
    }
    
    public function update (Request $request){
         if(Gate::allows('admin')){
            $id = $request->$id;
            $editora = editora::findOrFail(id);
            $updateEditora = $request->validate([
                'nome'=>['required', 'min:3', 'max:100'],
                'morada'=>['required', 'min:3', 'max:100'],
                'observacoes'=>['nullable', 'min:1', 'max:100'],
                ]);
            $editora->update($updateEditora);

            return redirect()->route('editoras.show', [
               'id'=>$editora->id_editora 
            ]);
         }
    }
    
    public function delete (Request $request){
         if(Gate::allows('admin')){
            $editora = editora::where('id_editora', $request->id)->first();
            if(is_null($editora)) 
            {
                return redirect()->route('editoras.index')->with('mensagem', 'A Editora nao existe');
            }
            else
            {
                return view('editoras.delete', ['editora'=>$editora]);
            }
         }
    }
    
    public function destroy (Request $request){
         if(Gate::allows('admin')){
            $ideditora = $request->id;
            $editora = editora::findOrFail($ideditora);
            $editora->delete();
            return redirect()->route('editoras.index')->with('mensagem', 'Editora eliminado');
         }
    }
}