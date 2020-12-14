<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    protected $primaryKey="id_comentario";
    
    protected $table="comentarios";  
    
    protected $fillable = [
        'comentario',
    ];
}
