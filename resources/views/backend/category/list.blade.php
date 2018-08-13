@extends ('backend.partial.master')

@section ('admin.head_title','Danh sách thể loại - Comic v1.0')

@section ('admin.header')
<link rel="stylesheet" type="text/css" href="{{ url('/backend') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css" />
@stop

@section ('admin.breadcrumb')
    <ol class="breadcrumb text-right">
     	<li><a href="#">Dashboard</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">List</li>
    </ol>        
@stop


@section ('admin.body_content')
<div class="animated fadeIn">
    <div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Data Table</strong>
	            </div>
	            <div class="card-body">
	            	@if(Session::has('flash_message'))
	                <div class="sufee-alert alert with-close alert-{!!Session::get('message_type') !!} alert-dismissible fade show">
	                    {!! Session::get('flash_message')  !!}
	                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">×</span>
	                    </button>
	                </div>
	                @endif
			      <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="bootstrap-data-table_length"><label>Show <select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="bootstrap-data-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table"></label></div></div></div>

		      	<div class="row">
			      	<div class="col-sm-12">
			      	<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
			        		<thead>
			          			<tr role="row">
			          				<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" style="width: 56px;">Order</th>
			          				<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" style="width: 200px;">Name</th>
			          				<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 390px;">Title</th>
			          				<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 200px;">Parent</th>
			          				<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 120px;">Action</th>
			          			</tr>
			        		</thead>
			        		<tbody> 
			        			@if(!empty($list))
				        			@foreach($list as $item)
								       	<tr role="row" class="odd">
								            <td class="text-center">{{ $item['cat_order'] }}</td>
								            <td>{{ $item['name'] }}</td>
								            <td>{{ $item['title'] }}</td>
								            <td class="text-center">
											@if($item['parent_id'] == 0)
												{!! "None" !!}
											@else 
												@php
													$parent = DB::table('categories')->where('id',$item['parent_id'])->first();
													echo '<strong>'.$parent->name.'</strong>';
												@endphp
											@endif
								            </td>
								            <td class="text-center"><a class="btn btn-success btn-sm" href="{!! URL::route('admin.category.edit',$item['id']) !!}/">Edit</a>
								            <a onclick="return cmClass.confirm('Bạn có muốn xóa ???')" class="btn btn-danger btn-sm" href="{!! URL::route('admin.category.delete',$item['id']) !!}/">Delete</a></td>
							          	</tr>
						          	@endforeach
					          	@else 
									<tr><td colspan="5" class="text-center"><p>Không có thể loại nào!!</p></td></tr>
					          	@endif
			      			</tbody>
			      		</table>
			  		</div>
			  	</div>

			  <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="bootstrap-data-table_next"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop

@section ('admin.footer')
@stop