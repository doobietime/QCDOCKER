<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ccpChecks extends Model
{
    protected $table = "ccpChecks";
    protected $primaryKey = 'idccpChecks';
	protected $fillable = [

        'idccpChecks',
		'created_at',
		'updated_at',
		'created_by',
		'verified_by',
        'status',
        'sku',
        'line',
        'veri_comments'


    ];
    
    public function ccpChecks_line() {

		return $this->hasMany('App\ccpChecks_lines','ccpID');

	}
}
