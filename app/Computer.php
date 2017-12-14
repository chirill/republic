<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    //
    protected $fillable = ['name','status','user_id','location_id','description'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function location(){
        return $this->belongsTo('App\Location');
    }
}
