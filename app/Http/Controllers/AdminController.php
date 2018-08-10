<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\models\Category;
use App\Helpers\MainHelper;

class AdminController extends Controller
{
    public function index(){
    	return view('backend.home.index');
    }
    /* category */
    public function categoryLIST(){
    	return view('backend.category.list');
    }

    public function categoryADD(){
        $parents = Category::select('id','name','parent_id')->get()->toArray();
    	return view('backend.category.add',compact('parents'));
    }

    public function categoryPOSTADD(AdminRequest $request){
        $cate              = new Category;
        $cate->name        = $request->txtCatname;
        $cate->content     = $request->txtCatcontent;
        $cate->cate_alias  = MainHelper::createAlias($request->txtCatalias);
        $cate->title       = $request->txtCattitle;
        $cate->description = $request->txtCatdes;
        $cate->parent_id   = $request->txtCatparent;
        $cate->cat_order   = $request->txtCatorder;
        $cate->save();
        $message = 'Thêm danh mục thành công!';
        return redirect()->route('admin.category.add')->with([
            'flash_message' => 'Thêm thể loại thành công!!!! ^^'
        ]);
    }

    public function categoryEDIT(){
    	return view('backend.category.edit');
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
