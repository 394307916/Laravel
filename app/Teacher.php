<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
		'icon',
		'is_master',
		'level',
		'min_wage',
		'name',
		'school',
		'sex',
		'teach_feature',
		'teach_subject'
    ];
}
