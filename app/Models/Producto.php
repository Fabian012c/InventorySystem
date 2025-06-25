<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 
        'cantidad', 
        'stock_minimo', 
        'categoria_id',
        'descripcion',
        'codigo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}