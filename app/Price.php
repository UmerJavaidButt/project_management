<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
    	'project_id',
    	'project_cost',
    	'pending_payment',
    	'released_payment',
    ];

    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }
}
