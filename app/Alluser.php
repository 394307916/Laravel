<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alluser extends Model
{
    protected $table = 'allusers';
    protected $primaryKey='openid';

    protected $fillable = [
		'openid',
		'session_key',
		'nickName',
		'avatarUrl',
		'province',
		'city',
    ];
}
