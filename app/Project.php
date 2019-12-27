<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    function get_works(){
    	$p =  $this->hasMany('App\Workprogress');
        $p->getQuery()->where('user_id','=', Auth::user()->id);
    	$p->getQuery()->where('status','=', 1);
      	return $p;
    }
    
    /* for other ppl viewing projects */
    function get_works_public(){
    	$p =  $this->hasMany('App\Workprogress');
    	$p->getQuery()->where('status','=', 1);
        $p->getQuery()->where('is_private','=', 0);
      	return $p;
    }
    /* for other ppl viewing projects */
}
