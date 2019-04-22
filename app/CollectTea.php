<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectTea extends Model
{
    protected $table = 'collect_teacher';
    protected $primaryKey='collect_teacher_id';

    protected $fillable = [
		'openid',
		'teacher_id',
		
    ];
}
