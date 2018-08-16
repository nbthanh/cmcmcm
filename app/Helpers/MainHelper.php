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
		public static function cat_parent($data,$parent = 0,$str="-",$select = 0,$curent = null) {
			$rs = "";
			foreach ($data as $item) {
				$id = $item['id'];
				$name = $item['name'];
				
				if ($parent == $item['parent_id']) {
					if ($select != 0 && $id == $select) {
						$rs .= '<option value="'.$id.'" selected>'.$str.$item['name'].'</option>';
					}else {
						if ($curent != $id) {
							$rs .= '<option value="'.$id.'">'.$str.$item['name'].'</option>';
						}
					}
					$rs .= self::cat_parent($data,$id,$str."-",null,$curent);
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
		 * [page_limit Giới hạn hiển thị item per page tùy chọn]
		 * @param  [integer] $limit [Láy dử liệu là số từ get] example ?limit=10
		 * @return [integer]        [trả về số page đã chọn và được lưu vào session các lần sau sử dụng]
		 */
		public static function page_limit($request){
			if (is_numeric($request->limit)) {
	            $request->session()->put('p_limit', $request->limit);
	            $p_limit = $request->limit;
	        }else if ($request->session()->exists('p_limit')) {
	            $p_limit = $request->session()->get('p_limit');
	        }else {
	            $p_limit = 10;
	        }

	       	return $p_limit;
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

		/*<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="bootstrap-data-table_next"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div>*/
		/**
		 * [pagination description]
		 * @param  array  $data [description]
		 * @return [string]       [return html]
		 * 
		 */
		public static function pagination($data = []){
			$default       = [
				'data'         => null,
				'current_page' => 1,
				'limit'		=> 10,
				'total_page' => 1,
				'total_record' => 1,
				'html'         => [
					'html_start'   => '<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">',
					'ul_start'     => '<ul class="pagination">',
					'ul_end'       => '</ul>',
					'li_start'     => '<li class="paginate_button page-item ">',
					'li_end'       => '</li>',
					'active'       => 'active'
				]
			];

			
		}
	}
?>