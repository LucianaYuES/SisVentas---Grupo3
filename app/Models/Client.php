<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $direccion
 * @property $DNI
 * @property $correo_electronico
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido', 'direccion', 'DNI', 'correo_electronico'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    
}
