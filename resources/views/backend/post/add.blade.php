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
                                    <input type="text" id="text-input" name="txtMeta_othername" placeholder="Tên gọi khác" class="form-control" value="{!! old('txtMeta_othername') !!}">
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
                                    <input type="text" id="text-input" name="txtMetaauthor" placeholder="Nhập tên tác giả" class="form-control" value="{!! old('txtMetaauthor') !!}">
                                    <small class="form-text text-muted">Tên tác giả cách nhau dấu phẩy (abc, bdc..)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tình trạng</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtMetastt" placeholder="Nhập tình trạng" class="form-control" value="{!! old('txtMetastt') !!}">
                                    <small class="form-text text-muted">Tình trạng (15/20, FULL, updating..)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nguồn</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtMetasrc" placeholder="Nhập nguồn truyện" class="form-control" value="{!! old('txtMetasrc') !!}">
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
                                    <input type="text" id="text-input" name="txtMetathumb" placeholder="Nhập thumbnail url" class="form-control" value="{!! old('txtMetathumb') !!}" />
                                    <small class="form-text text-muted">Upload thumbnail hoặc sử dụng URL</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="text-input" name="txtMetatitle" placeholder="Nhập title" class="form-control" value="{!! old('txtMetatitle') !!}">
                                    <small class="form-text text-muted">Mặc định giống tên</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-10">
                                  <textarea name="txtMetades" id="postDes" rows="9" placeholder="Description..." class="form-control">{!! old('txtMetades') !!}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-2"><label for="txtMonth" class=" form-control-label">Schedule</label></div>
                                <div class="col-12 col-sm-10">
                                    <div class="pull-left">
                                        <select name="txtMonth" id="txtMonth" class="form-control-sm form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                            <option value="4">Option #4</option>
                                            <option value="5">Option #5</option>
                                        </select>
                                    </div>
                                    <div class="pull-left">
                                        <input type="text" id="text-input" name="txtDD" class="input-sm form-control-sm form-control" size="2" value="{!! date('d') !!}" />
                                    </div>
                                    <div class="pull-left">
                                        <input type="text" id="text-input" name="txtYYYY" class="input-sm form-control-sm form-control" size="2" value="{{ date('Y') }}" />
                                    </div>
                                    <div class="pull-left">
                                        <input type="text" id="text-input" name="txtHH" class="input-sm form-control-sm form-control" size="2" value="{!! date('H') !!}" />
                                    </div>
                                    <div class="pull-left">
                                        <input type="text" id="text-input" name="txtII" class="input-sm form-control-sm form-control" size="2" value="{!! date('i') !!}" />
                                    </div>
                                    <div class="pull-left">
                                        <button class="btn btn-danger btn-sm">OK</button>&nbsp;<a href="#">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="textarea-input" class=" form-control-label">Content</label>
                                </div>
                                <div class="col-12 col-md-11">
                                  <textarea name="txtPostcontent" id="postContent" rows="9" placeholder="Content..." class="form-control">{!! old('txtPostcontent') !!}</textarea>
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