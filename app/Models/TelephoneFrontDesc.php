<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TelephoneFrontDesc extends Model
{
    use HasFactory;

    protected $fillable = [
        'telephone_id',
        'image_url',
        'description',
    ];

    public function productTelephones(): BelongsTo
    {
        return $this->belongsTo(ProductTelephone::class, 'telephone_id');
    }
}
