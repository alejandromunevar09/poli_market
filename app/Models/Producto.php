<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function proveedores()
{
    return $this->belongsToMany(Proveedor::class, 'producto_proveedor')
                ->withPivot('precio_unitario', 'cantidad_minima')
                ->withTimestamps();
}
}
