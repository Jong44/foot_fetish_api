<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id_kategori', 'id');
    }
}
