<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{

	public function notes(){
		return $this->belongsTo('App\IGCheck','id');
	}
    //
    protected $table = "Notes";
    protected $fillable = [

    	'id',
    	'igcheck_id',
		'updated_at',
		'created_at',
		'note_type',
		'note_body'

    ];
}
