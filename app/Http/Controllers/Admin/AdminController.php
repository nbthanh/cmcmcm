<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\AdminRequest;
use App\models\Category;
use App\Helpers\MainHelper;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
    	return view('backend.home.index'); 
    }

    /* category */
    public function catLIST(Request $request){
        
        $p_limit = MainHelper::page_limit($request);

        $list = Category::orderBy('cat_order','ASC')->paginate($p_limit);
    	return view('backend.category.list',compact('list'));
    }

    public function catADD(){
        $parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('backend.category.add',compact('parent'));
    }

    public function catPOSTADD(AdminRequest $request){
        $cate              = new Category;
        $cate->name        = $request->txtCatname;
        $cate->content     = $request->txtCatcontent;
        $cate->cate_alias  = MainHelper::createAlias($request->txtCatalias);
        $cate->title       = $request->txtCattitle;
        $cate->description = $request->txtCatdes;
        $cate->parent_id   = $request->txtCatparent;
        $cate->cat_order   = $request->txtCatorder;
        $cate->save();
        return redirect()->route('admin.category.add')->with([
            'flash_message' => 'Thêm thể loại thành công!!!! ^^'
        ]);
    }

    public function catEDIT($id){
        $data = Category::find($id)->toArray();
        $parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('backend.category.edit',compact('data','parent','id'));
    }

    public function catPOSTEDIT(Request $request){
        $id = $request->id;
        $error = array();

        //Thể loại không được chọn chính mình làm Parent_id
        if ($request->txtCatparent == $id) {
            return redirect()->route('admin.category.edit',$id)->with([
                'message_type'  => 'danger',
                'flash_message' => 'Tính phá gì đó cu???'
            ]);
        }

        //Thể loại không được chọn thể loại con làm parent_id
        $parent = Category::select('id')->where('parent_id',$id)->get();

        if (count($parent)>0) {
            $parents = [];
            foreach ($parent as $value) {
                $parents[] = $value->id; 
            }
            if(in_array($request->txtCatparent,$parents)){
                return redirect()->route('admin.category.edit',$id)->with([
                    'message_type'  => 'danger',
                    'flash_message' => 'Từ làm cha giờ xuống làm con luôn sao ???'
                ]);
            }
        }

        //validator form
        $validator = Validator::make($request->all(),
            [
                'txtCatname'           => 'required',
                'txtCatalias'          => 'required',
                'txtCatorder'          => 'integer|min:0'
            ],
            [
                'txtCatname.required'  => 'Vui lòng nhập tên thể loại',
                'txtCatalias.required' => 'Url không được bỏ tróng',
                'txtCatorder.integer'  => 'Nhập số dùm em',
                'txtCatorder.min'      => 'Nhập số âm làm gì ?',
            ]);

        if (!empty($validator) && $validator->fails()) {
           return redirect()->route('admin.category.edit',$id)->withErrors($validator); //check and edit lai back()
        }else {
            $cate = Category::find($id);
            $cate->name        = $request->txtCatname;
            $cate->content     = $request->txtCatcontent;
            $cate->cate_alias  = MainHelper::createAlias($request->txtCatalias);
            $cate->title       = $request->txtCattitle;
            $cate->description = $request->txtCatdes;
            $cate->parent_id   = $request->txtCatparent;
            $cate->cat_order   = $request->txtCatorder;
            $cate->save();
            return redirect()->route('admin.category.edit',$id)->with([
                'message_type' => 'success',
                'flash_message' => 'Sửa thể loại thành công!!!! ^^'
            ]);
        }
    }

    public function catDELETE($id){
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

    /* post */
    public function postLIST(){
    	return view('backend.post.list');
    }

    public function postADD(){
    	return view('backend.post.add');
    }

    public function postEDIT(){
    	return view('backend.post.edit');
    }
    /* \post */

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
