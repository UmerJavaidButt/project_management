<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'assign',
    	'start',
    	'deadline',
    	'status',
        'project_id',
        'employee_id',
    ];

    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }

    public function taskuser(){
        return $this->hasOne('App\TaskUser');
    }

    public function employee(){
    	return $this->belongsTo('App\Employee', 'task_users', 'id', 'employee_id');
    }
}
