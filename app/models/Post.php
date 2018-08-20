<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table 	= 'posts';
	protected $fillable = ['post_title','post_content','post_status','post_alias','comment_count','author_id','user_id','cat_id'];
	
	public $timestamps = true;
}
