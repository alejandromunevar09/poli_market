<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursosHumanos extends Model
{
    use HasFactory;

    public function autorizarVendedor(Vendedor $vendedor)
    {
        $vendedor->autorizado = true;
        $vendedor->save();
    }
}
