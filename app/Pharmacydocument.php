<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacydocument extends Model
{
    public function pharmacy()
    {
    	return $this->belongsTo('App\Pharmacy','id');
    }
}
