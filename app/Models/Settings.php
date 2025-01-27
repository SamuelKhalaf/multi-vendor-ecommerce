<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SettingsTranslation;

class Settings extends Model
{
    use HasFactory , Translatable;

    protected array $translatedAttributes = ['value'];
    protected $fillable = ['key','is_translatable','plain_value'];

    protected $hidden = ['created_at','updated_at'];

    protected $casts = [
        'is_translatable' => 'boolean',
        'plain_value' => 'array'
    ];

    public static function setMany($settings): void
    {
        foreach ($settings as $key => $value){
            self::set($key,$value);
        }
    }

    public static function set($key,$value): void
    {
        if ($key === 'translatable'){
            static::setTranslatableSettings($value);
        }
        if (is_array($value)){
            $value = json_encode($value);
        }
            static::updateOrCreate(['key' => $key], ['plain_value' => $value]);
    }

    public static function setTranslatableSettings($settings = []): void
    {
        foreach ($settings as $key => $value){
            static::updateOrCreate(
                ['key'=> $key],
                [
                    'is_translatable' => true,
                    'value' => $value
                ]
            );
        }
    }
}
