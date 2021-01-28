<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weighup extends Model
{
    protected $fillable = [

		'id',
		'verify',
		'type',
		'ingredient',
		'number_of_weighup',
		'correct_weight',
		'correct_ingredient',
		'correct_label',
		'correct_time',
		'checksheet_completed',
		'comments',
		'created_at',
		'updated_at',
		'datetime',
		'recorded_by',
		'verified_by'
		
	];
}
