<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPortal extends Model
{
    protected $table = 'clients_portal';

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

    public function deleteRequest(){
    	return $this->hasMany('App\DeleteClientRequest');
    }

    public function businessType(){
        return $this->belongsTo('App\BusinessType', 'business_type');
    }

    public function area(){
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'status');
    }
}
