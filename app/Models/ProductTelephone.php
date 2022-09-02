<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductTelephone extends Model
{
    use HasFactory;

    protected $fillable = [
        'telephone_category_id',
        'model',
        'slug',
        'price',
        'badge_new',
    ];

    protected $dates = ['deleted_at'];

    public function memories(): BelongsToMany
    {
        return $this->belongsToMany(TelephoneMemory::class, 'telephone_memory', 'telephone_id', 'memory_id');
    }
    
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'telephone_color', 'telephone_id', 'color_id');
    }
    
    public function CategoryTelephones(): BelongsTo
    {
        return $this->belongsTo(CategoryTelephone::class, 'telephone_category_id');
    }

    public function telephoneFrontDescs(): HasMany
    {
        return $this->hasMany(TelephoneFrontDesc::class, 'telephone_id');
    }

    public function telephoneFullDescs(): HasMany
    {
        return $this->hasMany(TelephoneFullDesc::class, 'telephone_id');
    }

    public function telephoneSpecifications(): HasMany
    {
        return $this->hasMany(TelephoneSpecification::class, 'telephone_id');
    }
}
