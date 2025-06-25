<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cantidad']; // Lista de atributos que pueden ser masificados

    // Relaciones
    // Puedes definir relaciones con otras tablas aquí si las necesitas
}