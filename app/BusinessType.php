<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $table = 'business_types';

    public $timestamps = false;

    protected $fillable = [
    	'name',
    	'status',
    	'is_deleted'
    ];
}
