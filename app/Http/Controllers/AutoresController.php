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
}
