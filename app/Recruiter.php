<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'number',
    	'country',
    ];

    public function project(){
    	return $this->belongsToMany('App\Project');
    }
}
