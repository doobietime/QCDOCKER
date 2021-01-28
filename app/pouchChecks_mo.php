<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pouchChecks_mo extends Model
{
   protected $table = "MOs";
   protected $fillable = [
   		'id',
		'sku_id',
		'mo_number',
		'pouch_id',
		'updated_at',
		'created_at'
		
	];

	public function pouchChecks_mo_lines()
	{
		return $this->hasMany(pouchChecks_mo_lines::class,'MOs_id');
	}
}
