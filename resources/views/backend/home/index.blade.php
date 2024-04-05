@extends('layouts.backend')
@section('content')

<!-- main content -->
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Information</h4>
				<div class="d-flex justify-content-end">
					<form action="{{route('generate.all.txt') }}" method="GET">
						<button type="submit" class="btn btn-primary mx-2"><i class="fas fa-file-alt" style="margin-right: 2px;"></i>Download All as TXT</button>
					</form>
					<form action="{{route('generate.all.pdf') }}" method="GET">
						<button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf" style="margin-right: 2px;"></i>Download All as PDF</button>
					</form>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-md">
						
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Date of Birth</th>
							<th>Phone Number</th>
							<th>Action</th>
						</tr>
						@if($infos->count() > 0)
						@foreach($infos as $info)
						<tr>
							<td>{{ $loop->index + 1}}</td>
							<td>{{ $info->firstName}}</td>
							<td>{{ $info->lastName}}</td>
							<td>{{ $info->dob}}</td>
							<td>{{ $info->phoneNumber}}</td>
							<td class="d-flex" style="gap: 5px">
								<form action="{{ route('generate.txt', $info->id) }}" method="GET">
									<button type="submit" href="#" class="btn btn-primary"><i class="fas fa-file-alt" style="margin-right: 2px;"></i>TXT File</button>
								</form>
								<form action="{{ route('generate.pdf', $info->id ) }}" method="GET">
									<button type="submit" href="#" class="btn btn-danger"><i class="fas fa-file-pdf" style="margin-right: 2px;"></i>PDF</button>
								</form>
								<a href="{{route('view.info', $info->id)}}" class="btn btn-info"><i class="fas fa-eye" style="margin-right: 2px;"></i>View All</a>
							</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="6" class="text-center" style="color: red">No Data Found!</td>
						</tr>
						@endif
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- main content end -->

@endsection