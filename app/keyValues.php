<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keyValues extends Model
{
   protected $table = "keyValues";
   protected $fillable = [
   		'machineName',
		'valueName',
		'value',
		'updated_at',
		'created_at'
		
	];

}
