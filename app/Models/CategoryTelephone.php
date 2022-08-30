<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryTelephone extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
    ];

    protected $dates = ['deleted_at'];

    public function productCategories(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function productTelephones(): HasMany
    {
        return $this->hasMany(ProductTelephone::class);
    }
}
