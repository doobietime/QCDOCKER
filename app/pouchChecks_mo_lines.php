<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pouchChecks_mo_lines extends Model
{
    
   protected $table = "MOs_lines";
   protected $fillable = [

		'MOs_id',
		'c1',
		'c2',
		'c3',
		'avg',
		'type',
		'updated_at',
		'created_at',
		'created_by'
		
	];


    public function pouchChecks_mo()
	{
	return $this->belongsTo('App\pouchChecks_mo','MOs_id');
	}
}
