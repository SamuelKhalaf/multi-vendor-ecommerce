<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const PAID = 'paid';
    const UNPAID = 'unpaid';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function user(){
        return $this -> belongsTo(User::class,'customer_id');
    }

}
