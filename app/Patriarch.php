<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patriarch extends Model
{
    protected $table = 'patriarchs';
    protected $primaryKey = 'patriarch_id';

    protected $fillable = [
		'openid',
		'grade',
		'min_wage',
		'name',
		'schedule',
		'sex',
		'site',
		'std_detail',
		'std_feature',
		'subject',
		'tch_feature',
		'tch_require',
		'tch_sex',
    ];
}
