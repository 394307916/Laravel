<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $primaryKey='teacher_id';

    protected $fillable = [
		'openid',
		'diploma_auth',
		'icon',
		'grade',
		'identity_auth',
		'introduction',
		'is_check',
		'is_collected',
		'is_inclass',
		'is_master',
		'is_online',
		'level',
		'major',
		'min_wage',
		'name',
		'presence_imgs',
		'region',
		'school',
		'sex',
		'status',
		'teach_city',
		'teach_country',
		'teach_exprience',
		'teach_feature',
		'teach_grade',
		'teach_review',
		'teach_subject',
		'teacher_auth',
		'tel',
		'trialclass_used',
		'video',
		'wechat',
		
    ];
}
