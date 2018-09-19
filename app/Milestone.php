<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
    	'project_id',
    	'name',
    	'cost',
    	'date',
    	'status',
    	'description',
    ];

    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }
}
