<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    public function pharmacy_docs()
    {
    	return $this->hasOne('App\Pharmacydocument','pharmacies_id');
    }
}
