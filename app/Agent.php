<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'number',
    	'address',
    	'country',
    	'business',
    	'whatsapp',
    	'website',
    	'share'
    ];

    // public function project(){
    // 	return $this->hasOne('App\Project');
    // }
}
