<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class syrups_lines extends Model
{
   protected $table = "Syrup_lines";
   protected $primarykey = "idSyrup_lines";
   protected $fillable = [
   		'verified_by',
   		'verified_status',
   		'made_date',
   		'batch_number',
		'Syrup_id',
		'done_by',
		'type',
		'c1',
		'c2',
		'c3',
		'avg',
		'updated_at',
		'created_at',
		'syrup_code',
		'comments',
		'syrup_name'
		
	];

	  public function syrups()
	{
	return $this->belongsTo('App\syrups','Syrup_id');
	}
}
