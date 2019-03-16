<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wxApp extends Model
{
    protected $table = 'wxapp';

    protected $fillable = [
		'image',
		'title',
		'content',
		'detail',
		'date'
    ];

}
