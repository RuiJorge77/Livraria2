<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    
    protected $primaryKey="id_autor";
    
    protected $table="autores";  
    
    protected $fillable = [
        'nome',
        'nacionalidade',
        'data_nascimento',
        'fotografia',
    ];
        
    /*public function livros(){
        return $this->hasMany('App\Models\Livro','id_autor');
    }*/
    
    public function livros(){
        return $this->belongsToMany(
            'App\Models\Livro',
            'autores_livros',
            'id_autor',
            'id_livro'
        )->withTimestamps();
    }
}
