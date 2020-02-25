<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class ProjectNotes extends Model
{
    protected $table = 'projects_notes';

    function projects(){
        return $this->belongsTo(Project::class);
    }
}
