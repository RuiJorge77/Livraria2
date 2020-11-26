<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('editoras.create');
    }
    
    public function store(Request $request){
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
