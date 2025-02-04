<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory , Translatable;

    protected $fillable = ['photo','is_active','name'];

    protected $hidden = ['translations'];

    protected $casts = ['is_active' => 'boolean'];

    protected array $translatedAttributes = ['name'];

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function getPhotoAttribute($val): string
    {
        return ($val !== null) ? asset('assets/images/brands/'.$val) : '';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active' , 1);
    }
}
