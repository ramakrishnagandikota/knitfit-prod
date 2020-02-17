<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $table = 'project';

    function users(){
        return $this->belongsTo(User::class);
    }
}
