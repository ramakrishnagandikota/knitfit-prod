<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Projectimages extends Model
{
    protected $table = 'projects_images';

    protected $fillable = [
    'id', 'user_id', 'project_id', 'image_path','created_at','ipaddress'
	];

    function projects(){
        return $this->belongsTo(Project::class);
    }
}
