<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{

	protected $table = 'SKUs';

    protected $fillable = [
    	'Code',
    	'Description',

    ];
}
