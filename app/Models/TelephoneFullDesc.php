<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelephoneFullDesc extends Model
{
    use HasFactory;

    protected $table = ['telephone_full_descs'];

    protected $fillable = [
        'telephone_id',
        'title',
        'image_url',
        'description',
    ];
}
