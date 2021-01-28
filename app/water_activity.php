<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class water_activity extends Model
{
    protected $table = "water_activity";
   	protected $fillable = [

		'created_at',
		'updated_at',
		'day', 
		'calibration_type',
		'calibration_set',
		'created_by',
		'retest',
		'test_type',
		'verified_status',
		'verified_by'
		
	];
}
