<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Projectneedle extends Model
{
    protected $table = 'projects_needle';

    

    function projects(){
        return $this->belongsTo(Project::class);
    }
}
