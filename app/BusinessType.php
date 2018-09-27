<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'business_types';

    public $timestamps = false;

    protected $fillable = [
    	'name',
    	'status',
    	'is_deleted'
    ];
}
