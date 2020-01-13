<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //
    protected $fillable = [
        'hour', 'date', 'date_id'
    ];

    public function mydate()
    {
        # code...
        return $this->belongsTo(Date::class, 'date_id');
    }
}
