<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table 	= 'posts';
	protected $fillable = ['post_title','post_alias','post_content','post_status','comment_count','author_id','user_id'];
	
	public $timestamps = true;

	public function postmeta(){
		return $this->hasMany('App\models\Postmeta','post_id','id');
	}

	public function user(){
		return $this->belongsTo('App\models\User','user_id');
	}
}