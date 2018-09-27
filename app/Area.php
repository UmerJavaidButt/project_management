<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'areas';

    public $timestamps = false;

    protected $fillable = [
    	'name',
    	'status',
    	'is_deleted'
    ];
}
