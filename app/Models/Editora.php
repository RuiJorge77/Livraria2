<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;
    
    protected $primaryKey="id_editora";
    
    protected $table="editoras";
    
    protected $fillable = [
        'nome',
        'morada',
        'observacoes',
    ];
    
    public function livros(){
        return $this->belongsToMany(
            'App\Models\Livro',
            'editoras_livros',
            'id_editora',
            'id_livro'
        )->withTimestamps();
    }  
}
