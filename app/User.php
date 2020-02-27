<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Project;
use App\Orders;
use App\Booking_process;
use App\UserMeasurements;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens,FriendRequestableTrait,FriendRequestAcceptableTrait;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

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

    function projects(){
      return $this->hasMany(Project::class);
    }

   function measurements(){
    return $this->hasMany(UserMeasurements::class);
   }

   function orders(){
    return $this->hasMany(Orders::class);
   }

   function bookings(){
    return $this->hasMany(Booking_process::class)->where('product_category',1);
   }
    
}
