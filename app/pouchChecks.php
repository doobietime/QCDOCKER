<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pouchChecks extends Model
{
   protected $table = "pouchChecks";
   protected $fillable = [
   		'id',
		'machineID',
		'product_used',
		'created_at',
		'updated_at',
		'created_by',
		'made_date',
		'bb_date',
		'packed_date',
		'mo_number',
		'film_part',
		'version',
		'verified_by',
		'verified_status',
		'is_retest',
		'product_used_code',
		'comments'
		
	];
	public static function getLastCheck($machine)
	{
		$latest = \App\pouchChecks::where('machineID',$machine)->count();
        if($latest > 0){
       
        	$abc = pouchChecks::latest()->where('machineID',$machine)->value('created_at');
        	 	$string = "Last Check : " . $abc;
        	 	return $string;
          // return pouchChecks::latest()->where('machineID',$machine)->value('created_at');
        }
        else
        {
        	return "no check for machine";
        }

	
	}

	public function pouchChecks_lines() 
	{
		return $this->hasMany(pouchChecks_lines::class,'pouchCheck_id');
	}

	public function pouchChecks_lines_weight() 
	{
		return $this->hasMany(pouchChecks_lines_weight::class,'pouchCheck_id');
	}

	public function pouchChecks_retest()
	{
		return $this->hasMany(pouchChecks_retest::class,'pouchCheck_id');
	}
	public function pouchChecks_mo()
	{
		return $this->hasMany(pouchChecks_mo::class,'pouch_id');
	}
}
