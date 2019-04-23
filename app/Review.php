<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'liuyan';
    protected $primaryKey = 'liuyan_id';

    protected $fillable = [
		'user_openid',
		'new_openid',
		'new_id',
		'text',
		'is_read',
		'user_img',
		'name',

    ];
}
