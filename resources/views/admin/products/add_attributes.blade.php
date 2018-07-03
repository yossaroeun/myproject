@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">

					<h1 class="m-0 text-dark">Products Attributes</h1>

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
							<h3 class="card-title">Add Products Attributes</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{url('/admin/add-attributes/'.$productDetial->id)}}" name="add-attributes" enctype="multipart/form-data">{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<input type="hidden" name="product_id" value="{{$productDetial->id}}">
								</div>
								<div class="form-group">
									<label for="exampleInputName" style="margin-left: 220px;">Product Name</label>
									<label for="exampleInputName" style="margin-left: 100px;"><strong>{{$productDetial->product_name}}</strong></label>
								</div>
								<div class="form-group">
									<label for="exampleInputName" style="margin-left: 220px;">Product Code</label>
									<label for="exampleInputName" style="margin-left: 106px;"><strong>{{$productDetial->product_code}}</strong></label>
								</div>
								<div class="form-group">
									<label for="exampleInputName" style="margin-left: 220px;">Product Color</label>
									<label for="exampleInputName" style="margin-left: 106px;"><strong>{{$productDetial->product_color}}</strong></label>
								</div>
								<div class="form-group">
									<label for="exampleInputName"></label>
									<div class="field_wrapper">
										<div style="margin-left: 180px;">
											<input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;" />
											<input required  type="text" name="size[]" id="size" placeholder="Size" style="width: 120px;" />
											<input required  type="text" name="price[]" id="price" placeholder="Price" style="width: 120px;" />
											<input required type="text" name="stock[]" id="stock" placeholder="
											Stock" style="width: 120px;" />
											<a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
										</div>
									</div>
								</div>
								
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary" id="s">Add Attributes</button>
								</div>

							</form>
						</div>

					</div><!-- /.col -->

				</div><!-- /.row -->
				<!-- /.col -->
			</div><!-- /.container-fluid --> 
    <!-- Content Table (Page header) -->
		<div class="container-fluid">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">View Products Attributes</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped" >
								<thead>
									<tr>
										<th>No</th>
										<th>Id</th>
										<th>SKU</th>
										<th>Size</th>
										<th>Price</th>
										<th>Stock</th>
										<th>Actions</th>

									</tr>
								</thead>
								<tbody>
									@foreach($productDetial['attributes'] as $attribute)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$attribute->id}}</td>
										<td>{{$attribute->sku}}</td>
										<td>{{$attribute->size}}</td>
										<td>{{$attribute->price}}</td>
										<td>{{$attribute->stock}}</td>

										<td><a  rel ="{{$attribute->id}}" rel1="delete-attributes" class="btn btn-danger btn-sm delAttribute">Delete</a></td>
									</tr>
									<!-- Modal Dialog for product detial -->
									@endforeach
								</tbody>

							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->

                 <h1 align="right"><a class="btn btn-danger btn-sm m-0 text-dark center" href="/admin/view-product">Back To View Product</a></h1>
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