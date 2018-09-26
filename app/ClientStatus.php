<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientStatus extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'client_status';

    protected $fillable = [
    	'client_id',
    	'status_id',
    ];
}
