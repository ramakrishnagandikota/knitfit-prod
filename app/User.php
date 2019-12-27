<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens,FriendRequestableTrait,FriendRequestAcceptableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function roles(){
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function email($email){
      return $this->where('email',$email);
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;   
    }

    public function hasRole($role){
        if($this->roles()->where('role_name',$role)->first()){
            return true;
        }
        return false;
    }
    
    
    function feedback(){
        return $this->hasMany('App\Feedback','user_id')->orderBy('id','desc');
    }

    function profile(){
    return $this->hasOne('App\Userprofile');
   }

   function college(){
    return $this->hasMany('App\Usercollege');
   }

   function family(){
    return $this->hasMany('App\Userfamily');
   }

   function workplace(){
    return $this->hasMany('App\Userworkplace');
   }

   function places(){
    return $this->hasMany('App\Userplaces');
   }


    function project_active(){
      $p = $this->hasMany('App\Project');
      $p->getQuery()->where('status','=', 2);
      return $p;
    }

   function project_complete(){
      $p = $this->hasMany('App\Project');
      $p->getQuery()->where('status','=', 1);
      return $p;
   }

   function project_ufo(){
      $p = $this->hasMany('App\Project');
      $p->getQuery()->where('status','=', 0);
      return $p;
   }

   function measurements(){
    return $this->hasMany('App\UserMeasurements');
   }
    
}
