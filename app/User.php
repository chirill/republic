<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','location_id','department_id','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profile(){
        return $this->hasOne('App\Profile');
    }
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
    public function forms(){
        return $this->hasMany('App\EmploymentForm');
    }



}
