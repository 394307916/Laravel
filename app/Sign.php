<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $table = 'sign';
    protected $primaryKey = 'sign_id';

    protected $fillable = [
		'openid',
		'patriarch_id',
		'status',		
    ];
}
