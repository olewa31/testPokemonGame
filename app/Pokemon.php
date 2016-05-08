<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['name', 'strength'];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
