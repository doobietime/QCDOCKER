<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oven extends Model
{
   protected $fillable = [

		'id',
		'verify',
		'datetime',
		'oven_product',
		'trolley_number',
		'colour',
		'spread',
		'correct_temp',
		'correct_time',
		'checklist_completed',
		'comments',
		'created_at',
		'updated_at',
		'recorded_by',
		'oven_number',
		'verified_by'
		
	];
}
