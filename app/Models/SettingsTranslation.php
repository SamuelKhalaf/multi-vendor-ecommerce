<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsTranslation extends Model
{
    use HasFactory;

    protected $table = 'settings_translation';
    protected $fillable = ['value'];

    public $timestamps = false;
}
