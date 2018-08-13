@extends ('backend.partial.master')

@section ('admin.head_title','Thêm thể loại mới - Comic v1.0')

@section ('admin.header')
    
@stop

	@section ('admin.breadcrumb')
	    <ol class="breadcrumb text-right">
	     	<li><a href="#">Dashboard</a></li>
	        <li><a href="#">Category</a></li>
	        <li class="active">Thêm thể loại</li>
	    </ol>        
	@stop

	@section ('admin.body_content')
	<div class="animated fadeIn">
	    <div class="row">
		    <div class="col-md-12">
		        <div class="card">
              <div class="card-header">
                <strong>Category</strong> / Thêm thể loại
              </div>
              <div class="card-body card-block">
                @if(Session::has('flash_message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
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
                                <label for="text-input" class=" form-control-label">Tên thể loại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtCatname" placeholder="Nhập tên thể loại" class="form-control">
                                <small class="form-text text-muted">Nhập tên thể loại vào ô bên trên</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Alias</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtCatalias" placeholder="Nhập url thể loại" class="form-control">
                                <small class="form-text text-muted">Mặc định gióng tên</small>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Parent</label></div>
                            <div class="col-12 col-md-9">
                              <select name="txtCatparent" id="select" class="form-control">
                                <option value="0">Please select</option>
                                @if(!empty($parent))
                                {!! MainHelper::cat_parent($parent) !!}
                                @endif
                              </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Title Meta</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtCattitle" placeholder="Nhập title" class="form-control">
                                <small class="form-text text-muted">Mặc định gióng tên</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Description Meta</label>
                            </div>
                            <div class="col-12 col-md-9">
                              <textarea name="txtCatdes" id="catDes" rows="9" placeholder="Description..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Thứ tự</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtCatorder" placeholder="Nhập số thứ tự" class="form-control" value="0">
                                <small class="form-text text-muted">Mặc định là 0</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Content</label>
                            </div>
                            <div class="col-12 col-md-9">
                              <textarea name="txtCatcontent" id="summernote" rows="9" placeholder="Content..." class="form-control"></textarea>
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