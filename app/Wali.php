<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'walis';
    protected $fillable = ['nama','santri_id'];
    public $timestamps = true;

    public function Santri()
	{
		return $this->belongsTo('App\Santri','santri_id');
	}
}
