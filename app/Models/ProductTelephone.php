<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTelephone extends Model
{
    use HasFactory;

    protected $table = ['product_telephones'];

    protected $fillable = [
        'telephone_category_id',
        'model',
        'slug',
        'color_id',
        'memory_id',
        'price',
        'badge_new',
    ];

    protected $dates = ['deleted_at'];
}
