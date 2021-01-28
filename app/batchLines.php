<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batchLines extends Model
{

	public function batch(){
		return $this->belongsTo('App\Batch','batchID');
	}
     protected $table = "batch_lines";
    	protected $fillable = [

    		
    		'batchID',
    		'created_at',
    		'updated_at',
    		'quantity_released',
    		'released_in_AX'




	];

}
