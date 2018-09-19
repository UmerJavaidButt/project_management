<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'number',
    	'whatsapp',
    	'website',
    	'business',
        'address',
        'country',
        'region',
        'description',
    ];

    public function project(){
    	return $this->hasOne('App\Project');
    }
}
