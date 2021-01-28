<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pouchChecks_lines_weight extends Model
{
   protected $table = "pouchChecks_lines_weight";
   protected $fillable = [

		'pouchCheck_id',
		'check1',
		'check2',
		'check3',
		'check4',
		'check5',
		'average',
		'updated_at',
		'created_at'
		
	];
	
	public function pouchChecks()
	{
	return $this->belongsTo('App\pouchChecks','pouchCheck_id');
	}
}
