<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    protected array $translatedAttributes = ['name','description','short_description'];

    protected $fillable = [
        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
    ];

    protected $casts = [
        'manage_stock'        => 'boolean',
        'in_stock'            => 'boolean',
        'is_active'           => 'boolean',
        'special_price_start' => 'datetime',
        'special_price_end'   => 'datetime',
        'deleted_at'          => 'datetime',
    ];

    public function getActive(): string
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function brand(): BelongsTo
    {
       return $this->belongsTo(Brand::class,'brand_id','id')->withDefault();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
