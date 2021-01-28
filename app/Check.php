<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
	protected $fillable = [

		'id',
		'verify',
		//'check_datetime',
		'recorded_by',
		'check_product',
		'created_at',
		'updated_at',
		'check_inv_1',
		'check_inv_2',
		'check_inv_3',
		'check_inv_4',
		'check_inv_5',
		'check_inv_target_range',
		'check_inv_average',
		'check_row_1',
		'check_row_2',
		'check_row_3',
		'check_row_target_range',
		'check_row_average',
		'check_dough_temp',
		'check_flour_temp',
		'check_butter_temp',
		'check_comments',
		're_check_inv_1',
		're_check_inv_2',
		're_check_inv_3',
		're_check_inv_4',
		're_check_inv_5',
		're_check_inv_average',
		're_check_row_1',
		're_check_row_2',
		're_check_row_3',
		're_check_row_average',
		'verified_by'

	];
}
