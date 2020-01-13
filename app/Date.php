<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //
    protected $fillbale = [
        'customer_id',
        'note',
        'service',
        'status'
    ];

    public function customer()
    {
        # code...
        return $this->belongsTo(Customer::class);
    }
}
