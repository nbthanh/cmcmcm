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

		/**
		 * [vn_to_str description]
		 * @param  [string] $str [Nhập vào chuổi có dấu]
		 * @return [string]      [Trả về chuổi không dấu]
		 */
		public static function vnTostr ($str){
			$unicode = array(
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'd'=>'đ|Đ',
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
	 
			foreach($unicode as $nonUnicode=>$uni){
				$str = preg_replace("/($uni)/", $nonUnicode, $str);
			}
			return $str;
		}

		/**
		 * [createAlias Hàm tạo alias]
		 * @param  [string] $str [Nhập vào chuổi bất kì] nhap-vao-chuoi-bat-ki	
		 * @return [string]      [Trả về chuổi alias] -> tra-ve-chuoi-alias
		 */
		public static function createAlias($str) {
			$str = self::vnTostr($str);
			$str = trim(strtolower($str));
		 	$str = preg_replace('/&.+?;/', '', $str); // kill entities
    		$str = str_replace('.', '-', $str);

        	$str = preg_replace('/(\%|[^%a-z0-9 _-])/', '', $str);
        	$str = preg_replace('/\s+/', '-', $str);
        	$str = preg_replace('|-+|', '-', $str);
        	
        	$str = rtrim($str,"-");
			return $str;
		}
	}
?>