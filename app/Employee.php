<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
    	'name',
    	'number',
    	'email',
    	'designation_id',
    	'team_id',
    	'teamAssign',
    ];

    public function designations(){
    	return $this->belongsTo('App\Designation', 'designation_id');
    }

    public function team(){
    	return $this->belongsTo('App\Team');
    }

    public function taskuser(){
        return $this->hasOne('App\TaskUser');
    }

    public function task(){
        return $this->belongsTo('App\Task', 'task_users', 'id', 'task_id');
    }
}
