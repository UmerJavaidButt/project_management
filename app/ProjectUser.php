<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = [
    	'team_id',
    	'project_id',
    ];

    public function team(){
    	return $this->belongsTo('App\Team', 'team_id');
    }

    public function projects(){
    	return $this->belongsTo('App\Project', 'project_id');
    }
}
