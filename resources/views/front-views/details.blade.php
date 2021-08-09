
@extends('layout.front-end.app')
@section('content')




<!-- Begin Header Area -->



<!-- Begin Breadcam Area -->
<div class="breadcam-area breadcam-bg breadcam-overlay">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="bradcam_text">
					<h3>Ispahani Islamia Eye Institute and Hospital</h3>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Hospital Details Area -->
<section class="single-hospital-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
            
				<div class="single-post">
					<!-- Hospital Img -->
					<div class="hospitale-img">
						<img class="img-fluid"src="/{{$data->image}}" alt="">
					</div>

					<div class="hospital-details" name="name" value="">
						<h2>{{$data->name}}
						</h2>
						<ul class="hospital-info-link mt-3 mb-4">
							<li><a href="#"><i class="fa fa-envelope font-icon"></i> {{$data->email}}</a></li>
							<li><a href="#"><i class="fa fa-chrome font-icon"></i>  {{$data->site}}</a></li>
							<li><a href="#"><i class="fa fa-phone font-icon"></i>{{$data->contact}}</a></li>
						</ul>
						<div class="address-box box-shadow-1 p-4">
							<address class="mb-0">
								<b>Address:</b>
								<p class="contactInfo mb-0" value="">  {!!$data->location!!}</p>
							</address>
						</div>
						<div class="about-wrapper">
							<p class="excert">
							{!!$data->description!!}
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.
							</p>
						</div>
					</div>
				</div>
              
			</div>
			<div class="col-lg-4">
				<div class="hospital-page-right-sidebar box-shadow-1">
					<aside class="single-sidebar-widget search-widget">
						<h4 class="widget_title">Get Appointment</h4>
						<form action="" method="post">
                        @csrf
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="name" placeholder='Patient Name' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name' Required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="contact" placeholder='Mobile Number' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number' Required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="number" class="form-control" name="age" placeholder='Age' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Age' Required">
								</div>
							</div>
							<div class="form-group">
                                <label class="mr-2 mb-0" Required>Gender :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" value="Male" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" value="Female" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="other" value="Other" name="gender" class="custom-control-input">
                                    <label class="custom-control-label" for="other">Other</label>
                                </div>
                            </div>
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="date" class="form-control" name="dob" placeholder='Patient Name' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name' Required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-3">
									<select class="form-control">
										<option>--Select Department--</option>
										<option>Eye</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-3">
									<select class="form-control">
										<option>--Select Doctor--</option>
										<option>Romesh</option>
									</select>
								</div>
							</div>
						
                           <div class="form-group">
								<div class="input-group mb-3">
									<select class="form-control">
										<option>--Select Hospital--</option>
										<option>Romesh</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
                                <label class="mr-2 mb-0" Required>Patient type :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="new" value="new" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="male">New</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="old" value="old" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="female">Old</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="other" value="other" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Comment" name="comment" class="form-control" rows="5"></textarea>
                            </div>
						<button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Get Appointment</button>
						</form>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
