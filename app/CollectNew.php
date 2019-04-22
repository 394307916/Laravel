<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectNew extends Model
{
    protected $table = 'collect_new';
    protected $primaryKey='collect_new_id';

    protected $fillable = [
		'openid',
		'new_id',
		
    ];
}
