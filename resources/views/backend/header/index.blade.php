@extends('layouts.backend')
@section('content')

<!-- main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Budget vs Sales</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-md">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Header</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($headers->count() > 0)
							@foreach($headers as $header)
							<tr>
								<td>{{ $loop->index + 1}}</td>
								<td>
									<img style="width: 70px" src="{{ url('upload/images', $header->image)}}">
								</td>
								<td>{{ $header->header }}</td>
								<td>
									<a href="{{ route('header.edit', $header->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5" class="text-center" style="color: red">No Data Found!</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>
<!-- main content end -->

@endsection