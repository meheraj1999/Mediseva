@extends('layout.front-end.app')
@section('content')
	<!-- Begin Breadcrumb  Area -->
	<div class="breadcrumb-area section-overlay">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h1 class="breadcrumb-title">About Us</h1>
				<ul>
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						About Us
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb Area -->

	<!-- Begin About Us -->
	<div class="about-us-area pad-50">
		<div class="container">
			<!-- Company Profile Area -->
			<div class="section-heading pad-b-20">
				<h2 class="section-heading-title">
					Forkania Education & Cultural Center
				</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<img src="{{ asset('assets/front-end/img/about/mosque.jpg') }}" style="border-radius: 50px 5px 50px; box-shadow: 0px 0px 20px rgb(0 0 0 / 15%);width: 100%">
				</div>
				<div class="col-md-6">
					<div class="about-content">
                        {!! $about_us['value'] !!}
					</div>
				</div>
			</div>

			<!-- Our Popular Product Area -->
			<div class="section-heading text-center mt-5">
				<h3>Our Aims</h3>
				<span>
					<i class="fas fa-mosque"></i>
				</span>
			</div>
			<div class="row">
		        <div class="col-lg-4 col-sm-6">
		          <div class="item"> 
		          	<span class="icon feature_box_col_one">
		          		<i class="fas fa-star-and-crescent"></i>
		          	</span>
		            <h6>Preserve the essence of Faith</h6>
		            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor Aenean massa.</p>
		          </div>
		        </div>
		        <div class="col-lg-4 col-sm-6">
		          <div class="item">
			        <span class="icon feature_box_col_two">
			           	<i class="fas fa-hamsa"></i>
			        </span>
		            <h6>Advancing the Islamic Faith</h6>
		            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor Aenean massa.</p>
		          </div>
		        </div>
		        <div class="col-lg-4 col-sm-6">
		          <div class="item"> 
		          	<span class="icon feature_box_col_three">
			          	<i class="fas fa-hand-holding-heart"></i>
			          </span>
		            <h6>Charity and Social resposibility</h6>
		            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor Aenean massa.</p>
		          </div>
		        </div>
            </div>
		</div>
	</div>
	<!-- End About Us -->
    

  <!-- Begin Our Vision Area -->
  <section class="our-vision-area section-overlay" style="background-image: url('assets/front-end/img/banner/banner5.jpg')">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                @php($our_vision=\App\Models\Setting::where('type', 'our_vision')->first())
                <div class="section-heading text-center">
                    <div class="col-md-8 m-auto text-center text-white">
                        {!! $our_vision['value'] !!}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

     <!-- Newsletter Area -->
   
    <!-- End Newsletter Area -->
@endsection