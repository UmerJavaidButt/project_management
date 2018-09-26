<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPortal extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'clients';

    protected $fillable = [
    	'title',
    	'email',
    	'phone',
    	'website',
    	'business_type',
        'area_id',
        'description',
        'status',
        'delete_bit',
    ];

    // public function area(){
    // 	return $this->belongsTo('App\Project');
    // }
}
