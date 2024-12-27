<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $category_id
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'precio', 'category_id', 'stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function disminuirStock($cantidad)
    {
        if ($this->stock >= $cantidad) {
            $this->stock -= $cantidad;
            $this->save();
        } else {
            throw new \Exception('Stock insuficiente para realizar la venta.');
        }
    }

    
}
