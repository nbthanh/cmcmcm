<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
	protected $fillable = ['name','cate_alias','content','title','description','parent_id','cat_order'];
	
	public $timestamps = false;

	public function posts(){
		return $this->belongsToMany('App\models\Post', 'cate_post', 'cate_id', 'post_id');
	}
}
