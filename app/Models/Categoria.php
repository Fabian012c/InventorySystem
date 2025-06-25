<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'color', 'icono', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($categoria) {
            $categoria->slug = Str::slug($categoria->nombre);
        });
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
