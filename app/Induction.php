<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Induction extends Model
{
   protected $fillable = [

		'id',
		'question',
		'op1',
		'op2',
		'op3',
		'op4',
		'ans',
		'user_ans'

	];
}
