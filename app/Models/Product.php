<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_brand','id_kategori','nama_product','brand','kategori','harga','description', 'rate','sold','review','image'
    ];

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function brands()
    {
        return $this->hasMany(Brand::class, 'id', 'id_brand');
    }

    public function foto(){
        return $this->hasMany(Foto_Produk::class, 'id_product', 'id');
    }
}
