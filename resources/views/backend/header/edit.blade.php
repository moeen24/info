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
				<form action="{{ route('header.update', $header->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Header</label>
						<input type="text" name="header" id="header" class="form-control" value="{{ $header->header }}">
						@if($errors->has('header'))
						<small style="color: red">{{ $errors->first('header')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea name="subheader" id="subheader" class="" style="width: 100%; height: 100px;">{{ $header->subheader }}</textarea>
						@if($errors->has('subheader'))
						<small style="color: red">{{ $errors->first('subheader')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Image of Product</label>
						<input type="file" name="image" id="image" data-default-file="{{ url('upload/images', $header->image)}}">
						@if($errors->has('image'))
						<small style="color: red">{{ $errors->first('image') }}</small>
						@endif
					</div>

					<button class="btn btn-primary" type="Submit">Save</button>
				</form>
			</div>
		</div>
	</div>
	
</div>
<!-- main content end -->

@endsection

@section('scripts')
<script>
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);
	});
	$('#image').dropify();
</script>
@endsection