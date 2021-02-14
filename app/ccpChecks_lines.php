<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ccpChecks_lines extends Model
{
    public function ccpCheck(){
		return $this->belongsTo('App\ccpChecks','ccpID');
	}
     protected $table = "ccpChecks_lines";
    	protected $fillable = [

    		
    		'ccpID',
    		'created_at',
    		'updated_at',
    		'test_piece',
            'result',
            'comments'




	];
}
