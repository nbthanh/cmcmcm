<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\AdminRequest;
use App\models\Category;
use App\models\Post;
use App\Helpers\MainHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct(){
        $except = ['auth_login'];
        $this->middleware(function($request, $next){
            if (Auth::check()) {
                if (Auth::user()->user_status == 1) {
                    return $next($request);
                }
            }
            return redirect()->route('admin.auth.login');
        })->except($except);
    }

    public function index(){
    	return view('backend.home.index'); 
    }

    /* category */
    public function catList(Request $request){
        //tùy chỉnh số bài viết hiể thị trên 1 trang
        $p_limit = MainHelper::page_limit($request);
        $list = Category::orderBy('cat_order','ASC')->paginate($p_limit);
    	return view('backend.category.list',compact('list'));
    }

    public function catAdd(){
        $parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('backend.category.add',compact('parent'));
    }

    public function catPostadd(AdminRequest $request){
        $cate              = new Category;
        $alias = MainHelper::createAlias($request->txtCatalias);
        if (!$cate::where('cate_alias', $alias)) {
            $cate->name        = $request->txtCatname;
            $cate->content     = $request->txtCatcontent;
            $cate->cate_alias  = $alias;
            $cate->title       = $request->txtCattitle;
            $cate->description = $request->txtCatdes;
            $cate->parent_id   = $request->txtCatparent;
            $cate->cat_order   = $request->txtCatorder;
            $cate->save();
            return back()->with([
                'flash_message' => 'Thêm thể loại thành công!!!! ^^'
            ]);
        }else {
            return back()->with([
                'message_type'  => 'danger',
                'flash_message' => 'Tên url đã tồn tại'
            ]);
        }
    }

    public function cateEdit(Request $request,$id){
        if ($request->post()) {
            $id = $request->id;
            $cate = Category::find($id);

            //Thể loại không được chọn thể loại con làm parent_id
            $parent = Category::select('id')->where('parent_id',$id)->get();
            $parents = [];
            $parents[] = (int)$id;
            if (count($parent)>0) {
                foreach ($parent as $value) {
                    $parents[] = $value->id; 
                }
            }

            $rules = [
                'txtCatname'           => 'required',
                'txtCatalias'          => 'required',
                'txtCatorder'          => 'integer|min:0',
                'txtCatparent'         => 'required|not_in:'.implode(',', $parents),
            ];

            $messages = [
                'txtCatname.required'       => 'Vui lòng nhập tên thể loại',
                'txtCatalias.required'      => 'Url không được bỏ tróng',
                'txtCatorder.integer'       => 'Nhập số dùm em',
                'txtCatorder.min'           => 'Nhập số âm làm gì ?',
                'txtCatparent.not_in'       => 'Có gì đó sai sai về logic ở mục parent'
            ];

            /*Check thể loại đã tồn tại và ngoại trừ chính nó*/
            if ($request->txtCatname !== $cate->name) { // ngoại trừ chính nó
                $rules['txtCatname']           = 'unique:categories,name';
                $messages['txtCatname.unique'] = 'Tên thể loại đã tồn tại';
            }

            /*Check alias đã tồn tại*/
            if (MainHelper::createAlias($request->txtCatalias) !== $cate->cate_alias) { //ngoại trừ chính nó
                $rules['txtCatalias']           = 'unique:categories,cate_alias';
                $messages['txtCatalias.unique'] = 'URL đã tồn tại';
            }

            $validator = Validator::make($request->all(),$rules,$messages);
            if (!empty($validator) && $validator->fails()) {
               return back()->withErrors($validator); //check and edit lai back()
            }else {
                $cate->name        = $request->txtCatname;
                $cate->content     = $request->txtCatcontent;
                $cate->cate_alias  = MainHelper::createAlias($request->txtCatalias);
                $cate->title       = $request->txtCattitle;
                $cate->description = $request->txtCatdes;
                $cate->parent_id   = $request->txtCatparent;
                $cate->cat_order   = $request->txtCatorder;
                $cate->save();
                return back()->with([
                    'message_type' => 'success',
                    'flash_message' => 'Sửa thể loại thành công!!!! ^^'
                ]);
            }
        }else {
            $data = Category::find($id)->toArray();
            $parent = Category::select('id','name','parent_id')->get()->toArray();
            return view('backend.category.edit',compact('data','parent','id'));
        }
    }

    public function catDelete($id){
        $parent = Category::where('parent_id',$id)->count();
        if ($parent == 0) {
            $cat = Category::find($id);
            $cat->delete();
            return redirect()->route('admin.category.list')->with([
                'message_type' => 'success',
                'flash_message' => 'Bạn đã xóa thành công thể loại!!'
            ]);
        }else {
            return redirect()->route('admin.category.list')->with([
                'message_type' => 'danger',
                'flash_message' => 'Thao tác không thành công, bạn phải xóa các thể loại con trước !!'
            ]);
        }
    }
    /* \category */

    /* POST */
    public function postList(){
    	return view('backend.post.list');
    }

    /**
     * [postAdd Thêm bài viết]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postAdd(Request $request){
        if ($request->post()) {
            $post              = new Post;

            $rules = [
                'txtPostname'    => 'required|unique:posts,post_name',
                'txtPostalias'   => 'unique:posts,post_alias',
                'txtPostcontent' => 'required',
                'catids'         => 'required|array'
            ];

            $messages = [
                'txtPostname.required'    => 'Vui lòng nhập tên bài viết',
                'txtPostname.unique'      => 'Tên bài viết đã tồn tại, nhập tên khác',
                'txtPostcontent.required' => 'Vui lòng nhập nội dung bài viết',
                'txtPostalias.unique'     => 'Alias (Url) đã tồn tại',
                'catids.required'         => 'Vui lòng chọn thể loại',
                'catids.array'            => 'Phá gì đó man'
            ];

            if (!$request->thumbFile && !$request->txtMetathumb) {
                $rules['txtMetathumb'] = 'required';
                $messages['txtMetathumb.required'] = 'Vui lòng cập nhật thumbnail';
            }else {
                $rules['thumbFile'] = 'mimes:jpeg,jpg,png,gif';
                $messages['thumbFile.mimes'] = 'Thumbnail chỉ chấp nhận dạng: jpeg, jpg, gif,png';
            }

            $validator = Validator::make($request->all(),$rules,$messages);
            if (!empty($validator) && $validator->fails()) {
               return back()->withErrors($validator); //check and edit lai back()
            }else {
                echo ' done';
            }
        }else {
            return view('backend.post.add');
        }	
    }

    public function postEDIT(){
    	return view('backend.post.edit');
    }
    /* \POST */



    /* chapter */
    public function chapterLIST(){
    	return view('backend.chapter.list');
    }

    public function chapterADD(){
    	return view('backend.chapter.add');
    }

    public function chapterEDIT(){
    	return view('backend.chapter.edit');
    }
    /* \chapter */

    /* user */
    public function userLIST(){
    	return view('backend.user.list');
    }

    public function userADD(){
    	return view('backend.user.add');
    }

    public function userEDIT(){
    	return view('backend.user.edit');
    }
    /* \user */
}
