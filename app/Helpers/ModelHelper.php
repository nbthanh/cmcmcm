<?php 	
	namespace App\Helpers;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	use App\Models\Category;
	use App\Models\Post;
	use App\Models\Postmeta;
	use App\Models\Comment;
	use App\Models\User;

	class ModelHelper
	{
		/**
		 * [add_post_meta Thêm thông tin bài viết]
		 * @param [integer]  $post_id    [description]
		 * @param [string]  $meta_key   [description]
		 * @param [text]  $meta_value [description]
		 * @param boolean $unique     [description]
		 */
		public function add_post_meta($post_id, $meta_key, $meta_value, $unique = false){
			return add_metadata('post',$post_id,$meta_key,$meta_value,$unique);
		}

		/**
		 * [add_metadata description]
		 * @param [type]  $meta_type  [post|comment|user|cate]
		 * @param [type]  $object_id  [description]
		 * @param [type]  $meta_key   [description]
		 * @param [type]  $meta_value [description]
		 * @param boolean $unique     [description]
		 */
		public function add_metadata($meta_type,$object_id, $meta_key, $meta_value, $unique = false){
			if (  !$meta_type || !$meta_key || !is_numeric($object_id) ) {
				return false;
			}

			$object_id = abs((int)$object_id);
		 	if ( ! $object_id ) {
		        return false;
		    }

		    if (!in_array($meta_type,['post','comment','user','cate'])) {
		    	return false;
		    }

		    $model = new $meta_type.'meta';
		    if ($unique) {
		    	if ($model::where(['meta_key' => $meta_key,'meta_value'=> $meta_value])->exists()) {
		    		return false;
		    	}
		    }

			$model->object_id  = $object_id;
			$model->meta_key   = $meta_key;
			$model->meta_value = $meta_value;
			if ($model->save()) {
				return $model->id;
			}else {
				return false;
			}
		}
	}
?>