<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orders;
use App\User;

class Booking_process extends Model
{
    protected $table = 'booking_process';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function order(){
    	return $this->belongsTo(Orders::class);
    }
}
