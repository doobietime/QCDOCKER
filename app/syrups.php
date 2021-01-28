<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class syrups extends Model
{
   protected $table = "Syrups";
   protected $fillable = [
   		'idSyrups',
		'updated_at',
		'created_at',
		'code'
		
	];

	public function syrup_lines()
	{
		return $this->hasMany(syrups_lines::class,'Syrup_id');
	}
}
