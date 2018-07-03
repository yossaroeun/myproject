@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Products</h1>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(Session::has('flash_message_error'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{!! Session('flash_message_error')!!}</strong>
					</div>
					@endif
					@if(Session::has('flash_message_success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{!! Session('flash_message_success')!!}</strong>
					</div>
					@endif
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Add Product</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{url('/admin/add-product')}}" name="add-product" enctype="multipart/form-data">{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputName">Under Category</label>
									<select name="category_id" class="form-control"  >
										<?php echo $categories_dropdown;?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName">Product Name</label>
									<input type="text" class="form-control" id="product_name" placeholder="Products Name" name="product_name" value="{{old('product_name')}}">
								</div>
								<div class="form-group">
									<label for="exampleInputName">Product Code</label>
									<input type="text" class="form-control" id="product_code" placeholder="Products code" name="product_code"​​​ value="{{old('product_code')}}">
								</div>
								<div class="form-group">
									<label for="exampleInputName">Product Color</label>
									<input type="text" class="form-control" id="product_color" placeholder="Products Color" name="product_color" value="{{old('product_color')}}">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail">Description</label>
									<textarea class="form-control" id="description" placeholder="Description" name="description" >{{old('description')}}</textarea>
									
								</div>
								<div class="form-group">
									<label for="exampleInputName">Price</label>
									<input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{old('price')}}">
								</div>
								<div class="form-group">
									<label for="exampleInputFile">File input image</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file"  id="image" name="image" value="{{old('image')}}" >
											
										</div>

									</div>
								</div>
								<!-- /.card-body -->

								<div class="card-footer" >
									<button type="submit" class="btn btn-primary" id="s" >Add Products</button>
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