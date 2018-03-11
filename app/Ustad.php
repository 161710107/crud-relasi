<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ustad extends Model
{
    protected $table = 'ustads'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['nama','no_induk']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function Santri()
    {
    	return $this->hasMany('App\Santri','ustad_id');
    }
}
