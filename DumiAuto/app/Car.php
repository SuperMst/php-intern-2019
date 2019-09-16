<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['manufacturer','model','year','rent_price', 'in_service'];

    public function rents()
    {
        return $this->hasMany('App\RentLog');
    }
}
