<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
    	'name',
    	'team_lead',
    	'shift',
    ];

    public function employee(){
    	return $this->belongsTo('App\Employee', 'team_lead');
    }
}
