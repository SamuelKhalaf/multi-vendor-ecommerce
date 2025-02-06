<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $table = 'categories';
    protected $guarded = [];

    protected $hidden = ['translations'];

    protected array $translatedAttributes = ['name'];

    public function scopeParent($query)
    {
         return $query->whereNull('parent_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active' , 1);
    }

    public function getActive(): string
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function _parent(): BelongsTo
    {
        return $this->belongsTo(self::class,'parent_id','id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_categories','category_id','product_id');
    }
}
