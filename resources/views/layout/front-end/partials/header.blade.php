<header>
	<div class="header-area ">
		<div class="header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-md-6">
						<div class="short-contact-list">
                        @php($config=\App\Helpers\Helper::get_app_settings('appEmail'))
							<ul>
							<li><a href="#"> <i class="fa fa-envelope"></i>{{$config['name']}}</a></li>
                            @php($config=\App\Helpers\Helper::get_app_settings('appPhone'))
							<li><a href="#"> <i class="fa fa-phone"></i> {{$config['name']}}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-6 col-md-6 ">
                    @php($config=\App\Helpers\Helper::get_business_settings('social'))
                    
						<div class="social-media-links">
							<a href="{{$config['facebook']}}" target="_blank">
								<i class="fa fa-facebook facebook-icon"></i>
							</a>
							<a href="{{$config['twiter']}}" target="_blank">
								<i class="fa fa-twitter twitter-icon"></i>
							</a>
							<a href="{{$config['linkdin']}}" target="_blank">
								<i class="fa fa-linkedin linkedin-icon"></i>
							</a>
						</div>
					</div>
				 </div>
			</div>
		</div>
		<div id="sticky-header" class="main-header-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-2">
						<div class="logo">
							<a href="/">
								<img src="{{asset('assets/front-end/img/logo.png')}}" alt="logo">
							</a>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7">
						<div class="main-menu  d-none d-lg-block">
							<nav>
								<ul id="navigation">
									<li><a class="active" href="/">home</a></li>
									<li><a href="{{route('doctor')}}">Doctors</a></li>
									<li><a href="{{route('hospital')}}">Hospital</a></li>
									<li><a href="{{route('service')}}">Service</a></li>
									<li><a href="javascript:void(0)">Appointment</a></li>
									<li><a href="javascript:void(0)">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 d-none d-lg-block">
						<div class="login">
							<div class="login-btn d-none d-lg-block">
								<a class="popup-with-form" href="javascript:void(0)">Login</a>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="mobile_menu d-block d-lg-none"></div>
					</div>
				</div>
			 </div>
		</div>
	</div>
</header>