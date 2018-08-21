<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Postmeta extends Model
{
    protected $table 	= 'postmeta';
	protected $fillable = ['post_id','meta_key','meta_value'];
	
	public $timestamps = false;

	public function post(){
		return $this->belongsTo('App\models\Post');
	}
}
