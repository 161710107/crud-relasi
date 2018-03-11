<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
     protected $table = 'santris';
     protected $fillable = ['nama','nis','ustad_id'];
     public $timestamps = true;

	public function Ustad()
	{
		return $this->belongsTo('App\Ustad','ustad_id');
	}

    public function Wali()
    {
    	return $this->hasOne('App\Wali','santri_id');
    }
}
