<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function _parent(): void
    {
        $this->belongsTo(self::class,'parent_id','id');
    }
}
