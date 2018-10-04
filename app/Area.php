<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    public $timestamps = false;

    protected $fillable = [
    	'name',
    	'status',
    	'is_deleted'
    ];
}
