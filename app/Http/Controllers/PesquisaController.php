<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class PesquisaController extends Controller
{
    //
    public function index(){
        return view('pesquisa');
    }
    public function formenviado(Request $request){
        $string=$request->pesquisa;
        $re=Livro::where('titulo','Like','%'.$string.'%')->get();
        return view('pesquisares',['pesquisa'=>$string,'resultado'=>$re]);
    }
}
