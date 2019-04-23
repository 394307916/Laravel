<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad_text extends Model
{
    protected $table = 'advertise_text';
    protected $primaryKey='ad_text_id';

    protected $fillable = [
		'text',
    ];
}
