<?php 	
	/**
	 *  Helpers
	 */
	namespace App\Helpers;
	class MainHelper
	{
		/**
		 * [cat_parent description]
		 * @param  [Array] $data   [description]
		 * @param  [Numberic] $parent [description]
		 * @return [String]         [description]
		 */
		public static function cat_parent($data,$parent = 0,$str="-",$select = 0) {
			$rs = "";
			foreach ($data as $item) {
				$id = $item['id'];
				$name = $item['name'];
				if ($parent == $item['parent_id']) {
					if ($select != 0 && $id == $select) {
						$rs .= '<option value="'.$id.'" selected>'.$str.$item['name'].'</option>';
					}else {
						$rs .= '<option value="'.$id.'">'.$str.$item['name'].'</option>';
					}
					$rs .= self::cat_parent($data,$id,$str."-");
				}
			}
			return $rs;
		}
	}
?>