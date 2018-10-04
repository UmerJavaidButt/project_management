<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeleteClientRequest extends Model
{
    protected $table = 'delete_client_requests';

    public $timestamps = false;

    protected $fillable = [
    	'client_id',
    	'reason',
    	'status',
    ];

    public function client(){
    	return $this->belongsTo('App\ClientPortal', 'client_id');
    }
}
