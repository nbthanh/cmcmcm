@extends ('backend.partial.master')

@section ('admin.head_title','Thêm thể loại mới - Comic v1.0')

@section ('admin.header')
    
@stop

@section ('admin.breadcrumb')
    <ol class="breadcrumb text-right">
     	<li><a href="#">Dashboard</a></li>
        <li><a href="#">Post</a></li>
        <li class="active">Thêm truyện</li>
    </ol>        
@stop

@section ('admin.body_content')
<div class="animated fadeIn">
    <div class="row">
	    <div class="col-md-12">
	        <div class="card">
                <div class="card-header">
                    <strong>Post</strong> / Thêm truyện
                </div>
                <div class="card-body card-block">
                    @if(Session::has('flash_message'))
                    <div class="sufee-alert alert with-close alert-{!! Session::get('message_type') !!} alert-dismissible fade show">
                        {!! Session::get('flash_message')  !!}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->any())
                     <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                       <p><span class="badge badge-pill badge-danger">Error !!!</span></p>
                            @foreach($errors->all() as $error)
                                <p>{!! $error !!}</p>
                            @endforeach
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div> 
                    @endif
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                      {!! csrf_field() !!}
                       <div class="col-sm-12 col-md-6">
                            <div class="row form-group">
                                <div class="col-12 col-md-3">
                                    <label for="text-input" class=" form-control-label">Tên Truyện</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPostname" placeholder="Nhập tên truyện" class="form-control" value="{!! old('txtPostname') !!}">
                                    <small class="form-text text-muted">Nhập tên truyện vào ô bên trên</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-3">
                                    <label for="text-input" class=" form-control-label">Tên gọi khác</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPostothername" placeholder="Tên gọi khác" class="form-control" value="{!! old('txtPostothername') !!}">
                                    <small class="form-text text-muted">Nhập tên gọi khác của truyện vào ô bên trên mặc định rổng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Alias (URL)</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPostalias" placeholder="Nhập url truyện" class="form-control" value="{!! old('txtPostalias') !!}">
                                    <small class="form-text text-muted">Mặc định giống tên: (mac-dinh-giong-ten)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Thể loại</label></div>
                                <div class="col col-md-9">
                                  <div class="form-check col-md-12">
                                    {!! MainHelper::cate_list() !!}
                                  </div>
                                    <div class="col-md-12">
                                  <small class="form-text text-muted">Một truyện có thể có nhiều thể loại</small></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tên tác giả</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPostauthor" placeholder="Nhập tên tác giả" class="form-control" value="{!! old('txtPostauthor') !!}">
                                    <small class="form-text text-muted">Tên tác giả cách nhau dấu phẩy (abc, bdc..)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tình trạng</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPoststt" placeholder="Nhập tình trạng" class="form-control" value="{!! old('txtPoststt') !!}">
                                    <small class="form-text text-muted">Tình trạng (15/20, FULL, updating..)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nguồn</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtPostsrc" placeholder="Nhập nguồn truyện" class="form-control" value="{!! old('txtPostsrc') !!}">
                                    <small class="form-text text-muted">Nguồn từ: (webtruyen, nettruyen, tangthuvien....)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-2"><label for="file-input" class=" form-control-label">Thumbnail</label></div>
                                <div class="col-12 col-md-10">
                                    <input type="file" id="file-input" name="thumbFile" class="form-control-file" />
                                    &nbsp;
                                    <input type="text" id="text-input" name="thumbUrl" placeholder="Nhập thumbnail url" class="form-control" />
                                    <small class="form-text text-muted">Upload thumbnail hoặc sử dụng URL</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="text-input" name="txtPosttitle" placeholder="Nhập title" class="form-control" value="{!! old('txtPosttitle') !!}">
                                    <small class="form-text text-muted">Mặc định giống tên</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-10">
                                  <textarea name="txtPostdes" id="postDes" rows="9" placeholder="Description..." class="form-control">{!! old('txtPostdes') !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="textarea-input" class=" form-control-label">Content</label>
                                </div>
                                <div class="col-12 col-md-11">
                                  <textarea name="txtPostcontent" id="postContent" rows="9" placeholder="Content..." class="form-control">{!! old('txtCatcontent') !!}</textarea>
                                  <script type="text/javascript">
                                    var editor = CKEDITOR.replace( 'postContent' );
                                    CKFinder.setupCKEditor( editor );
                                  </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
	    </div>
    </div>
</div>
@stop

@section ('admin.footer')
@stop