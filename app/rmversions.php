<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rmversions extends Model
{
  protected $table = 'rms_versions';
  protected $fillable = [
    	'RM_code',
    	'RM_id',
    	'version',
    	'created_at',
    	'updated_at'
    ];
}
