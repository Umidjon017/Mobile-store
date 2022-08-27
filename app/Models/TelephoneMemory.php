<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelephoneMemory extends Model
{
    use HasFactory;

    protected $table = ['telephone_memories'];

    protected $fillable = [
        'memory',
    ];
}
