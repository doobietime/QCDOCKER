<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [

		'id',
		'igcheck_id',
		'image_path',
		'created_at',
		'updated_at',
		'isdoc'


	];
}
