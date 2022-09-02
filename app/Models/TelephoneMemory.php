<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TelephoneMemory extends Model
{
    use HasFactory;

    protected $fillable = [
        'memory_main',
        'memory_ram',
    ];

    public function telephones(): BelongsToMany
    {
        return $this->belongsToMany(ProductTelephone::class, 'telephone_memory', 'telephone_id', 'memory_id');
    }
}
