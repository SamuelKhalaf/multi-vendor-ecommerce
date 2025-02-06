<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    protected $fillable = ['photo'];

    public function getPhotoAttribute($val): string
    {
        return asset('assets/images/sliders/'.$val);
    }
}
