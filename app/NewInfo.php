<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewInfo extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'new_id';

    protected $fillable = [
		'openid',
		'address',
		'details',
		'type_name',
		'user_name',
		'user_tel',
    ];
}
