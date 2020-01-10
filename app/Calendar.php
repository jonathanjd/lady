<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //
    protected $fillable = [
        'service', 'hour', 'date', 'customer_id'
    ];

    public function customer()
    {
        # code...
        return $this->belongsTo(Customer::class);
    }
}
