<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['avatar','hobby','user_id','about'];

    public function user(){
        return $this->hasOne('App\User');
    }
}
