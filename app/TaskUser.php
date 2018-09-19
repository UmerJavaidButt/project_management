<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $fillable = [
    	'employee_id',
    	'task_id',
    ];

    public function employee(){
    	return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function task(){
    	return $this->belongsTo('App\Task', 'task_id');
    }
}
