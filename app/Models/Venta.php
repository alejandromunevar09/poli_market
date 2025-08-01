<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function vendedor() {
        return $this->belongsTo(Vendedor::class);
    }

    public function detalles() {
        return $this->hasMany(DetalleVenta::class);
    }

}
