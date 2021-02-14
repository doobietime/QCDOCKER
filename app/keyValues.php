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
		'value1',
		'value2',
		'value3',
		'value4',
		'updated_at',
		'created_at'
		
	];

}
