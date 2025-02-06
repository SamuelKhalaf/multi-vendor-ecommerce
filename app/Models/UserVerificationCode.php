<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerificationCode extends Model
{
    use HasFactory;
    protected $table = 'user_verification_codes';
    protected $fillable = ['user_id','verification_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
