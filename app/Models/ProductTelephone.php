<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function CategoryTelephones(): BelongsTo
    {
        return $this->belongsTo(CategoryTelephone::class, 'telephone_category_id');
    }

    public function colors(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function memoris(): BelongsTo
    {
        return $this->belongsTo(TelephoneMemory::class, 'memory_id');
    }

    public function telephoneFrontDescs(): HasMany
    {
        return $this->hasMany(TelephoneFrontDesc::class);
    }

    public function telephoneFullDescs(): HasMany
    {
        return $this->hasMany(TelephoneFullDesc::class);
    }

    public function telephoneSpecifications(): HasMany
    {
        return $this->hasMany(TelephoneSpecification::class);
    }
}
