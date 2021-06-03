<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $primaryKey = 'idMarca';//Esto hay que agregarlo porque laravel asume que el id siempre se llama id
    public $timestamps =false;
}
