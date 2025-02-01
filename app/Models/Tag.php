<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory , Translatable;

    protected $fillable = ['slug','name'];

    protected $hidden = ['translations'];

    protected array $translatedAttributes = ['name'];
}
