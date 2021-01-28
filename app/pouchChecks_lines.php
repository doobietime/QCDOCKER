<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pouchChecks_lines extends Model
{
   protected $table = "pouchChecks_lines";
   protected $fillable = [

		'pouchCheck_id',
		'specification',
		'result_in_spec',
		'comments',
		'updated_at',
		'created_at'
		
	];

	public function pouchChecks()
	{
	return $this->belongsTo('App\pouchChecks','pouchCheck_id');
	}
}
