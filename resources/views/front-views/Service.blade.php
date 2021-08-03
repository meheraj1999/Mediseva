@extends('layout.front-end.app')
@section('content')



<!-- Begin Header Area -->



<!-- Begin Breadcam Area -->
<div class="breadcam-area breadcam-bg breadcam-overlay">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="bradcam_text">
					<h3>Our Best Service</h3>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Begin Departments Area -->
<div class="our-service-area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-55">
					<h3>Our Services</h3>
					<p>Esteem spirit temper too say adieus who direct esteem. <br>
					It esteems luckily or picture placing drawing. </p>
				</div>
			</div>
		</div>
		<div class="row">
        @foreach($serviceData as $data)
			<div class="col-xl-4 col-md-6 col-lg-4">
				<div class="single-service">
					<div class="service-thumb">
						<img src="{{$data->image}}" alt="">
					</div>
					<div class="service-content">
						<h3><a href="javascript:void(0)">{{$data->title}}</a></h3>
						<p>{!!$data->description!!}</p>
						<div class="dc-btn-area">
							<a href="javascript:void(0)" class="dc-btn">Read More</a>
						</div>
					</div>
				</div>
			</div>
        @endforeach
		</div>
	</div>
</div>


<!-- Emergency Contact Area -->
<div class="Emergency_contact">
	<div class="conatiner-fluid p-0">
		<div class="row no-gutters">
			<div class="col-xl-6">
				<div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
					<div class="info">
						<h3>For Any Emergency Contact</h3>
						<p>Esteem spirit temper too say adieus.</p>
					</div>
					<div class="info_button">
						<a href="javascript:void(0)" class="boxed-btn3-white">+10 378 4673 467</a>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
					<div class="info">
						<h3>Make an Online Appointment</h3>
						<p>Esteem spirit temper too say adieus.</p>
					</div>
					<div class="info_button">
						<a href="javascript:void(0)" class="boxed-btn3-white">Make an Appointment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

