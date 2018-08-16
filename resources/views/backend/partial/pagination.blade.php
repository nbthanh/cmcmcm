@php
	$start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
	if ($paginator->currentPage() == 1) {
		$start = 1;
	}
	$end = $paginator->lastItem();
@endphp
<div class="row">
	<div class="col-sm-12 col-md-5">
		<div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing {{  $start }} to {{ $end }} of {{ $paginator->total() }} entries</div>
	</div>
	<div class="col-sm-12 col-md-7">
		<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
			<ul class="pagination">
				@if(PaginateRoute::hasPreviousPage())
					<li class="paginate_button page-item previous" id="bootstrap-data-table_previous"><a href="{{ PaginateRoute::previousPageUrl() }}" class="page-link">Previous</a></li>
				@else
					<li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a class="page-link">Previous</a></li>
				@endif

			  	@for ($i = 1; $i <= $paginator->lastPage(); $i++)
					<li class="paginate_button page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a href="{{ PaginateRoute::pageUrl($i) }}" class="page-link">{{ $i }}</a></li>
			  	@endfor
				
				@if(PaginateRoute::hasNextPage($paginator))
					<li class="paginate_button page-item next" id="bootstrap-data-table_next"><a href="{{ PaginateRoute::nextPageUrl($paginator) }}" class="page-link">Next</a></li>
				@else
					<li class="paginate_button page-item next disabled" id="bootstrap-data-table_next"><a class="page-link">Next</a></li>
				@endif
			</ul>
		</div>
	</div>
</div>