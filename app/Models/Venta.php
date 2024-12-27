<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class); // Cambiado a Client
    }

    public function producto()
    {
        return $this->belongsTo(Product::class);
    }
}
