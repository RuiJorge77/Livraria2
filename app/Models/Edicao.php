<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicao extends Model
{
    use HasFactory;
    protected $primaryKey1="id_livro";
    protected $primaryKey2="id_editora";
    protected $table="edicoes";  
}
