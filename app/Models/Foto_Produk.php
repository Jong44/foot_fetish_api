<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'foto1',
        'foto2',
        'foto3',
        'foto4'
    ];


}
