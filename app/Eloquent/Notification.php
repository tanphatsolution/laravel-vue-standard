<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
    	'name','text','icon','guard','sender_id','receiver_id','url','read'
    ];
}
