<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scale_calibration extends Model
{
    protected $table = "scale_calibration";
   	protected $fillable = [

		'created_at',
		'updated_at',
		'date',
		'scale_weight',
		'created_by',
		'verified_status',
		'verified_by'
		
	];
}
