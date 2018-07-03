@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Category</h1>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Add Category</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{url('/admin/add-category')}}">{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputName">Category Name</label>
									<input type="text" class="form-control" id="category_name" placeholder="Category Name" name="category_name" value="{{old('category_name')}}">
								</div>
								<div class="form-group">
									<label for="exampleInputName">Category Levels</label>
									<select name="parent_id" class="form-control">
							          <option value="0">Main Categories</option>
									  @foreach($levels as $level)
									    <option value="{{$level->id}}">{{$level->name}}</option>
									  @endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail">Description</label>
									<textarea class="form-control" id="description" placeholder="Description" name="description">{{old('description')}}</textarea>
									
								</div>
								
								<div class="form-group">
									<label for="exampleInputPassword1">URL</label>
									<input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{old('url')}}">
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary" id="s">Add Category</button>
								</div>

							</form>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard v2</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->


				<!-- Main r ow -->

				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			alert('hello');
		</script>
@endsection