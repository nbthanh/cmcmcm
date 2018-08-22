<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table 	= 'posts';
	protected $fillable = ['post_title','post_alias','post_content','post_status','comment_count','author_id','user_id'];
	
	public $timestamps = true;

	public function postmeta(){
		return $this->hasMany('App\Models\Postmeta','post_id','id');
	}

	public function users(){
		return $this->belongsTo('App\Models\User','user_id');
	}

	public function categories(){
		return $this->belongsToMany('App\Models\Category','cate_post','cate_id','post_id');
	}
}