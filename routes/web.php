<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::post('/login', 'AuthController@auth_login')->name('admin.auth.login');
	Route::get('/login', 'AuthController@auth_login')->name('admin.auth.login');

	Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'category'], function() {
    	Route::get('/', function(){
	    	return redirect()->route('admin.category.list');
	    });

    	//custom paginate => domain.com/page/1
		Route::paginate('/list', [
			'as' => 'admin.category.list', 
			'uses' => 'AdminController@catList' 
		]);

		// sử dụng make:request nên không gọp get và post vào chung dc
		Route::post('/add', 'AdminController@catPostadd')->name('admin.category.postadd');
		Route::get('/add', 'AdminController@catAdd')->name('admin.category.add');

		// gop get va post vào chung không sử dụng make:request [name]
		Route::match(['get', 'post'],'/edit/{id}', 'AdminController@cateEdit')->name('admin.category.edit');
		
		Route::get('/delete/{id}', 'AdminController@catDelete')->name('admin.category.delete');
    });

    Route::group(['prefix' => 'post'], function(){
    	Route::get('/', function(){
	    	return redirect()->route('admin.post.list');
	    });
	    Route::get('/list', 'AdminController@postList')->name('admin.post.list');
	    Route::match(['get','post'],'/add', 'AdminController@postAdd')->name('admin.post.add');


	    Route::get('/edit', 'AdminController@postEdit')->name('admin.post.edit');
    });


    Route::group(['prefix' => 'chapter'], function(){
    	Route::get('/', function(){
	    	return redirect()->route('admin.chapter.list');
	    });
	    Route::get('/list', 'AdminController@chapterLIST')->name('admin.chapter.list');
	    Route::get('/add', 'AdminController@chapterADD')->name('admin.chapter.add');
	    Route::get('/edit', 'AdminController@chapterEDIT')->name('admin.chapter.edit');
    });

    Route::group(['prefix' => 'user'], function(){
    	Route::get('/', function(){
	    	return redirect()->route('admin.user.list');
	    });
	    Route::get('/list', 'AdminController@userLIST')->name('admin.user.list');
	    Route::get('/add', 'AdminController@userADD')->name('admin.user.add');
	    Route::get('/edit', 'AdminController@userEDIT')->name('admin.user.edit');
    });


});

Route::get('/get-test',function(){
	$test = "Đôi lúc ta muốn gom nhóm Regex lại cho dễ nhìn, việc này đơn giản ta chỉ cần đặt đoạn mã Regex bên trong cặp đóng và mở (). Khi sử dụng gom nhóm thì việc so khớp vẫn bình thường, tuy nhiên với kết quả về của biến \$matches thì sẽ có sự thay đổi và chi tiết thế nào thì ở phần Capturing Group dưới đây mình sẽ đề cập tới.....%%%%%%%%%%%%%%%%%%%%%%%%";
	echo MainHelper::createAlias($test);
});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
