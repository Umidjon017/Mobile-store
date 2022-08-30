<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TelephoneMemory extends Model
{
    use HasFactory;

    protected $fillable = [
        'memory_main',
        'memory_ram',
    ];

    public function productTelephones(): HasMany
    {
        return $this->hasMany(ProductTelephone::class);
    }
}
