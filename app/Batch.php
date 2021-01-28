<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

	public function batchLine() {

		return $this->hasMany('App\batchLines','foreign_key');

	}
	protected $table = "batchesForIG";
	protected $fillable = [

		'id',
		'batch_code',
		'best_before',
		'quantity',
		'released_in_AX',
		'quantity_remaining',
		'temperature',
		'updated_at',
		'created_at',
		'foreign_key',
		'quantity_pallets'


	];
    //
}
