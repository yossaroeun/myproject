@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Categories Table</h1>
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
						<h3 class="card-title">Table Categories</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped" >
							<thead>
								<tr>
									<th>No</th>
									<th>Category Name</th>
									<th>Category Lavel</th>
									<th>Descriptions</th>
									<th>URL</th>
									<th>Actions</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $category)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$category->name}}</td>
									<td>{{$category->parent_id}}</td>
									<td>{{$category->description}}</td>
									<td>{{$category->url}}</td>
									<td><a href="{{url('/admin/edit-category/'.$category->id)}}"class="btn btn-primary btn-sm">Edit</a>  <a id="delCate" rel="category->id" rel1="delete-category" <?php /*href="{{asset('/admin/delete-category/'.$category->id)}}" */ ?> class="btn btn-danger btn-sm delCategory">Delete</a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Category Name</th>
									<th>Descriptions</th>
									<th>URL</th>
									<th>Actions</th>
								</tr>
							</tfoot>
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