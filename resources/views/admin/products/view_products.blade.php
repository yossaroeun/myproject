@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Produts Table</h1>
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
					
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Data Tables</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Table Products</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped " >
							<thead>
								<tr>
									<th>No</th>
									<th>Products Id</th>
									<th>Category Id</th>
									<th>Category Name</th>
									<th>Products Name</th>
									<th>Products Code</th>
									<th>Products Color</th>
									<th>Descriptions</th>
									<th>Price</th>
									<th>Images</th>
									<th>Actions</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$product->id}}</td>
									<td>{{$product->category_id}}</td>
									<td>{{$product->category_name}}</td>
									<td>{{$product->product_name}}</td>
									<td>{{$product->product_code}}</td>
									<td>{{$product->product_color}}</td>
									<td>{{$product->description}}</td>
									<td>{{$product->price}}</td>
									<td class="center">
										@if(!empty($product->image))
										<img src="{{asset('/images/backend_images/products/small/'.$product->image)}}" style="width: 60px;">
										@endif
									</td>
									<td class="center"><a href="#modal-default{{$product->id}}" data-toggle="modal" class="btn btn-success btn-sm">View</a>
										<a href="{{asset('/admin/add-attributes/'.$product->id)}}"  class="btn btn-success btn-sm" >Add</a><a href="{{url('/admin/edit-product/'.$product->id)}}"class="btn btn-primary btn-sm">Edit</a>  <a  rel ="{{$product->id}}" rel1="delete-product" <?php /*href="{{asset('/admin/delete-product/'.$product->id)}}" */?> class="btn btn-danger btn-sm delProduct">Delete</a></td>
								</tr>
								<!-- Modal Dialog for product detial -->
								<div class="modal fade" id="modal-default{{$product->id}}" data-toggle="modal" class="btn btn-" style="display: none;">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">

												<h4 class="modal-title">{{$product->product_name}} full detial</h4>
											</div>
											<div class="modal-body">
												<p>Product Id:{{$product->id}}</p>
												<p>Category Id:{{$product->category_id}}</p>
												<p>Product code:{{$product->product_code}}</p>
												<p>Product color:{{$product->product_color}}</p>
												<p>Price:{{$product->price}}</p>
												<p>Description:{{$product->description}}</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								@endforeach
							</tbody>
							
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
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
</div>
@endsection