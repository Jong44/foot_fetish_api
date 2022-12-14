<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'brand','nama_brand','banner','logo'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id_brand', 'id');
    }


}
