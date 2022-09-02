<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function telephones(): BelongsToMany
    {
        return $this->belongsToMany(ProductTelephone::class, 'telephone_color', 'telephone_id', 'color_id');
    }
}
