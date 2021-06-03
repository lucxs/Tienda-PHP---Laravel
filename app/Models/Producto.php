<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
   protected $primaryKey = 'idProducto';
   public $timestamps = false;

   ###Metodos de las relaciones
        //Relacion a Marcas
            public function relMarca()
            {
                return $this->belongsTo(

                        '\App\Models\Marca',//Ruta del model al que corresponde
                        'idMarca', //owner
                        'idMarca'  // Foreing key
                ); //Me trae un dato que pertenece a otra tabla
            }
            public function relCategoria()
            {
                return $this->belongsTo(
                '\App\Models\Categoria',
                'idCategoria',
                'idCategoria'
                );
            }

}
