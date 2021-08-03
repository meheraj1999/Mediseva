@extends('layout.front-end.app')
@section('content')
<div class="home-banner-area"></div>

<!-- Home Doctor Search Area -->
<div class="home-search-area pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 m-auto">
				<div class="home-search-area-wrap">
					<div class="home-search-area-content">
						<div class="home-search-area-title">
							<h1>Start Your Search</h1>
						</div>
						<div class="home-search-form">
							<form>
								<div class="form-group">
									<input type="text" name="" class="form-control" placeholder="Search doctors, clinis, hospital, etc.">
								</div>
								<div class="search-suggestion-box d-none">
									<div class="search-suggestion-list">
										<a href="javascript:void(0)">
											<div class="search-suggestion-item">
												<div class="search-suggestion-item-content">
													<span class="search-suggestion-item-name">Anaesthesiology</span>
													<span class="search-suggestion-item-desc">Specalist</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Home Doctor List Area -->
<div class="home-doctor-list-area section-padding-50">
	<div class="container">
			<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-55">
					<h3>Our Doctors</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
            @foreach ($doctorData as $data)
				<div class="single-doctor-list-wrap">
					<div class="row">
						<div class="col-md-8 no-padding">
							<div class="doctor-infos">
								<a href="doctor-details.html">
									<figure class="dc-docpostimg">
										<img width="" height="" class="" src="/{{$data->image}}" alt="Velit Şenli">
									</figure>
								</a>
								<div class="doctor-info-overview">
									<h2 class="doctor-name">
										<a href="doctor-details.html"></a>
									</h2>
									<div class="doctor-degree">
										{{$data->name}}           
									</div>
									<div class="doctor-speciality">
										{!!$data->description!!}
									</div>
									
									
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="doctor-info-overview2" id="posts">
								<span><i class="ti-direction-alt"></i>{{$data->experience}}</span>
								<span><i class="ti-thumb-up"></i>{{$data->code}}</span>
								<span><i class="ti-wallet"></i>{{$data->time}}</span>
								<span><i class="ti-wallet"></i>{{$data->fees}}</span>
								<div class="dc-btnarea">
									<a href="#" class="dc-btn">Book Appointment</a>
								</div>
							</div>
                            
						</div>
                        
					</div>
				</div>
		  @endforeach
			</div>
		</div>
	</div>
</div>

<!-- Home Hospital List -->
<div class="home-hospital-list-area section-padding-0-50">
	<div class="container">
			<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-55">
					<h3>Hospitals</h3>
				</div>
			</div>
		</div>
		<div class="row">
        @foreach ($hospitalData as $data)
			<div class="col-md-6">
				<div class="single-hospital-list-wrap box-shadow-1">
					<div class="hospital-infos">
						<a href="hospital-details.html">
							<figure class="dc-docpostimg">
								<img width="" height="" class="" src="/{{$data->image}}" alt="Velit Şenli">
							</figure>
						</a>
						<div class="hospital-info-overview">
							<h2 class="hospital-name">
								<a href="hospital-details.html">{{$data->name}}  </a>
							</h2>
							<div class="hospital-location">
								<address class="h-list_address">
                                {!!$data->location!!}
                                </address>
							</div>
							{{$data->description}}
							<div class="dc-btnarea">
								<a href="hospital-details.html" class="dc-btn">Read More</a>
							</div>
						</div>
					</div>
				</div>
                
			</div>
            @endforeach
		</div>
	</div>
</div>


<!-- Begin Departments Area -->
<div class="our_department_area">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-55">
					<h3>Our Departments</h3>
					<p>Esteem spirit temper too say adieus who direct esteem. <br>
					It esteems luckily or picture placing drawing. </p>
				</div>
			</div>
		</div>
		<div class="row">
        @foreach ($depertmentData as $data)
			<div class="col-xl-4 col-md-6 col-lg-4">
				<div class="single_department">
					<div class="department_thumb">
						<img src="/{{$data->image}}" alt="">
					</div>
					<div class="department_content">
						<h3><a href="#">{{$data->name}}</a></h3>
						<p>{!!$data->description!!}</p>
						<a href="#" class="learn_more">Learn More</a>
					</div>
				</div>
           
			</div>
            @endforeach
		</div>
	</div>
</div>

<!-- strategic-partner Area -->
<div class="strategic-partner">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="doctors_title mb-55">
					<h3>Strategic Partner</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="expert_active owl-carousel">
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/b.png" alt="">
						</div>
					</div>
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/m4.jpg" alt="">
						</div>
					</div>
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/n1.png" alt="">
						</div>
					</div>
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/p.jpg" alt="">
						</div>
					</div>
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/s2.png" alt="">
						</div>
					</div>
					<div class="single-partner">
						<div class="partner-thumb">
							<img src="img/partner/m3.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
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
						<a href="#" class="boxed-btn3-white">+10 378 4673 467</a>
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
						<a href="#" class="boxed-btn3-white">Make an Appointment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    
@endsection

@push('script')
<script>
    $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>

<script>
$(function() {
    $(".see-more").click(function() {
  $div = $($(this).data('div')); //div to append
  $link = $(this).data('link'); //current URL

  $page = $(this).data('page'); //get the next page #
  $href = $link + $page; //complete URL
  $.get($href, function(response) { //append data
    $html = $(response).find("#posts").html(); 
    $div.append($html);
  });

  $(this).data('page', (parseInt($page) + 1)); //update page #
});
</script>
@endpush