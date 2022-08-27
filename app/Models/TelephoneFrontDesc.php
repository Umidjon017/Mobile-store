<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelephoneFrontDesc extends Model
{
    use HasFactory;

    protected $table = ['telephone_front_descs'];

    protected $fillable = [
        'telephone_id',
        'image_url',
        'description',
    ];
}
