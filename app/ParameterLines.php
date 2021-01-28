<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterLines extends Model
{
    //

    protected $table = "parameter_lines";
    	protected $fillable = [

    		'igcheck_key',
			'parameter_name',
			'parameter_key',
			'parameter_type',
			'specification',
			'results_in_spec',
			'comments'




	];

}
