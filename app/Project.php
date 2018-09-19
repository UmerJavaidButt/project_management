<?php

namespace App;
use App\Clients;
use App\Recruiter;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'name',
        'project_url',
    	'description',
    	'client_id',
    	'recruiter_id',
    	'start_date',
    	'deadline',
    	'status',
    	'assign',
        'price',
        'commission',
        'team',
    ];

    public function client(){
    	return $this->belongsTo('App\Clients', 'foriegn_key');
    }

    public function recruiter(){
        return $this->belongsTo('App\Recruiter', 'foriegn_key');
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }
}
