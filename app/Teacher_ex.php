<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_ex extends Model
{
    protected $table = 'ex_teacher';
    protected $primaryKey='ex_id';

    protected $fillable = [
		'teacher_id',
		'description',
		'start_time',
		'stop_time',
    ];
}
