<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Projectyarn extends Model
{
    protected $table = 'projects_yarn';

    function projects(){
        return $this->belongsTo(Project::class);
    }
}
