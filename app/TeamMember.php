<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
    	'team_id',
    	'employee_id',
    ];

    public function teams(){
    	return $this->belongsTo('App\Team', 'team_id');
    }

    public function employees(){
    	return $this->belongsTo('App\Employee', 'employee_id');
    }
}
