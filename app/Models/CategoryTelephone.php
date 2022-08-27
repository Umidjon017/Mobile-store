<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTelephone extends Model
{
    use HasFactory;

    protected $table = ['category_telephones'];

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
    ];

    protected $dates = ['deleted_at'];
}
