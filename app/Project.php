<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Projectimages;
use App\Projectneedle;
use App\Projectyarn;
use App\ProjectNotes;

class Project extends Model
{
    protected $table = 'projects';

    function users(){
        return $this->belongsTo(User::class);
    }

    function project_images(){
    	return $this->hasMany(Projectimages::class);
    }

    function project_needle(){
    	return $this->hasMany(Projectneedle::class);
    }

    function project_yarn(){
    	return $this->hasMany(Projectyarn::class);
    }

    function project_notes(){
        return $this->hasMany(ProjectNotes::class);
    }
}
