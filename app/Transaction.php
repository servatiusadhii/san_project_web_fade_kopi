<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'users_id', 'inscurance_price', 'shipping_price', 'total_price', 'transaction_status', 'code', 'resi', 'manual_status', 'products_name','voucher'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
