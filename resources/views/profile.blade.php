@extends('dashboard.app')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.css')}}">
@endpush
<div class="container">
		<!-- Row -->
		<div class="row m-t-30">
				<!-- Column -->
				<div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card">
								<div class="card-body">
										<center class="m-t-30">
											@if(!(Auth::user()->file)==null)
												<img src="{{URL::to('/')}}/{{Auth::user()->file}}" class="img-circle" width="150" />
											@else
												<img src="{{asset('images/man.png')}}" class="img-circle" width="150" />
											@endif

												<h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
												<h6 class="card-subtitle">{{config('app.name')}}'s User</h6>
												<!-- <div class="row text-center justify-content-md-center">
														<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
														<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
												</div> -->
										</center>
								</div>
								<div>
										<hr> </div>
								<div class="card-body"> <small class="text-muted">Email address </small>
										<h6>{{Auth::user()->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
										<h6>+6{{Auth::user()->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
										<h6>{{Auth::user()->address}}</h6>
										<!-- <div class="map-box">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0872834619595!2d101.49802035047895!3d3.071352554471151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc52f4eba4b891%3A0x83c37ff669bdbb4!2sFaculty+of+Computer+%26+Mathematical+Sciences%2C+UiTM!5e0!3m2!1sen!2smy!4v1525357395860" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
										</div> -->
										<!--<small class="text-muted p-t-30 db">Social Profile</small>
										<br/>
										<button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
										<button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
										<button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>-->
								</div>
						</div>
				</div>
				<!-- Column -->
				<!-- Column -->
				<div class="col-lg-8 col-xlg-9 col-md-7">
						<div class="card">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs profile-tab" role="tablist">
										<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
										<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#image" role="tab">Change Image</a> </li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
										<!--second tab-->
										<div class="tab-pane active" id="profile" role="tabpanel">
												<div class="card-body">
													<?php $id = Auth::user()->id; ?>
														<form class="form-horizontal form-material"  method="POST" action="{{ url('/user/profile-update/'. $id .'') }}">
															  @csrf
																<div class="form-group">
																		<label class="col-md-12">Full Name</label>
																		<div class="col-md-12">
																				<input type="text" name="p_name" value="{{Auth::user()->name}}" class="form-control form-control-line">
																		</div>
																</div>
																<div class="form-group">
																		<label for="example-email" class="col-md-12">Email</label>
																		<div class="col-md-12">
																				<input type="email" name="p_email" value="{{Auth::user()->email}}" class="form-control form-control-line" name="example-email" id="example-email">
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-md-12">Phone No</label>
																		<div class="col-md-12">
																				<input type="text" name="p_phone" value="{{Auth::user()->phone}}" class="form-control form-control-line">
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-md-12">Address</label>
																		<div class="col-md-12">
																				<textarea name="p_address" class="form-control form-control-line">{{Auth::user()->address}}</textarea>
																		</div>
																</div>

																<div class="form-group">
																		<div class="col-sm-12 text-right">
																				<button class="btn btn-success" style="width:150px">Update</button>
																		</div>
																</div>
														</form>
												</div>
										</div>
										<style>
										form p{
											text-align: center;
										}
										</style>
										<div class="tab-pane" id="image" role="tabpanel">
											<div class="card-body">
													<?php $id = Auth::user()->id; ?>
													<form class="form-horizontal form-material"  method="POST" action="{{ url('/user/image-update/'. $id .'') }}" enctype="multipart/form-data">
													  {{ csrf_field()}}
															<div class="form-group">
																	<div class="col-sm-12">
																		<input type="file" name="file" id="input-file-now-custom-3" class="dropify" data-height="500" data-max-file-size="2M" accept="image/x-png,image/jpeg" />
																	</div>
															</div>
															<div class="form-group">
																	<div class="col-sm-12 text-right">
																			<button class="btn btn-success" style="width:150px">Submit</button>
																	</div>
															</div>
													</form>
											</div>
										</div>
								</div>
						</div>
				</div>
				<!-- Column -->
		</div>
		<!-- Row -->
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->

</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	// Basic
  $('.dropify').dropify();
});
</script>
@endpush
