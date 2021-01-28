<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
    //
   		protected $table = "parameters";
    	protected $fillable = [
    		'RM_code',
    		'RM_id',
    		'parameter_name',
    		'specification',
    		'updated_at',
    		'created_at'




	];
}
