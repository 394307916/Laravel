<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payMoney extends Model
{
    protected $table = 'payMoney';
    protected $primaryKey = 'money_id';

    protected $fillable = [
		'money',

    ];
}
