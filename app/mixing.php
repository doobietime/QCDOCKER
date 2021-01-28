<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mixing extends Model
{
    //

    	protected $fillable = [

		'id',
		'verify',
		'mixing_type',
		'recorded_by',
		'created_at',
		'updated_at',
		'mixing_datetime',
		'mixing_product',
		'mixing_no_of_mixes',
		'correct_ingredients',
		'correct_weights',
		'mixing_sop_followed',
		'checksheets_completed',
		'comments_observation',
		'verified_by'
		
	];
}
