<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory , Translatable;

    protected $fillable = ['name'];

    protected $hidden = ['translations'];

    protected array $translatedAttributes = ['name'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
