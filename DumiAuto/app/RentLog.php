<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentLog extends Model
{
    protected $fillable = ['car_id', 'user_id', 'start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
