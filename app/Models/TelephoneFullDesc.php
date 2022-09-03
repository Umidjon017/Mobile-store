<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TelephoneFullDesc extends Model
{
    use HasFactory;

    protected $fillable = [
        'telephone_id',
        'full_title',
        'full_image_url',
        'full_description',
    ];
    
    public function productTelephones(): BelongsTo
    {
        return $this->belongsTo(ProductTelephone::class, 'telephone_id');
    }
}
