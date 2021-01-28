<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{

	protected $table = 'SKUs';

    protected $fillable = [
    	'Code',
    	'id',
    	'Description',
    	'target_range_ind_min',
    	'target_range_ind_max',
    	'target_range_row_min',
    	'target_range_row_max',
        'product_type',
        'updated_at',
        'created_at',
        'supplier',
        'pouch_min',
        'pouch_max',
        'pouch_target',
        'film_part_no',
        'best_before_days',
        'product_sub_type',
        'pouch_version'

    ];
}
