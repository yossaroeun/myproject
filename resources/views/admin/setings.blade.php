@extends('layouts.adminLayouts.admin_design')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Admin Setings</h1>
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
							<h3 class="card-title">Update Password</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{url('/admin/update-pwd')}}">{{csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Current Password</label>
									<input type="password" class="form-control" id="current_pwd" placeholder="Current Password" name="current_pwd">
									<span id="pwdChk"></span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">New Password</label>
									<input type="password" class="form-control" id="new_pwd" placeholder="New Password" name="new_pwd">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<input type="password" class="form-control" id="confirm_pwd" placeholder="Confirm Password" name="confirm_pwd" >
								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary" id="s">Update Password</button>
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