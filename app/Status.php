<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'statuses';

    protected $fillable = [
    	'name',
    	'label_color',
    	'status',
    	'is_deleted',
    ];
}
