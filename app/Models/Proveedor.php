<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor')
                    ->withPivot('precio_unitario', 'cantidad_minima')
                    ->withTimestamps();
    }
}
