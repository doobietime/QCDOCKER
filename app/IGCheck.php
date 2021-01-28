<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IGCheck extends Model
{
		protected $table = "igchecks";
    	protected $fillable = [

		'id',
		'created_at',
		'item_code',
		'item_name',
		'updated_at',
		'completed',
		'rms_completed',
		'release_completed',
		'PO_number',
		'soa_image_path',
		'rmsversion_used',
		'igcheck_supplier',
		'verified_by',
		'verified_status',
		'finalised_date',
		'igs_done_by',
		'rms_done_by',
		'release_done_by',
		'qa_notes',
		'location'


	];

	public function scopeSearch($query, $q)
	{
		if ($q == null) return $query;
		return $query->where('item_name', 'LIKE', "%{$q}%")
		->orWhere('item_code', 'LIKE', "%{$q}%");
	}

	public function notes()
	{
		return $this->hasMany('App\Notes','igcheck_id');
	}
}
