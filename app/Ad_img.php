<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad_img extends Model
{
    protected $table = 'advertise_img';
    protected $primaryKey='ad_img_id';

    protected $fillable = [
		'img',
    ];
}
