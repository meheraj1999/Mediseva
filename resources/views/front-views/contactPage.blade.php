@extends('layout.front-end.app')
@push('css')
 <style>
     .banner_area .banner_inner{
        min-height: 225px !important;
     }
     .banner_area{
        min-height: 274px;
     }
 </style>
@endpush
@section('content')
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-right">
				<h1>Contact</h1>
				<div class="page_link">
					<a href="/">Home</a>
					<a href="javascript:void(0)">Contact</a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="contact_area ">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="fa fa-home"></i>
						<h6 class="mb-3">
                            @php($config=\App\Helpers\Helper::get_app_settings('appAddress'))
                            @php($phone=\App\Helpers\Helper::get_app_settings('appPhone'))
                            @php($email=\App\Helpers\Helper::get_app_settings('appEmail'))


						{{ $config['name'] }}
						</h6>
					</div>
					<div class="info_item mb-3">
						<i class="fa fa-phone"></i>
						<h6><a href="#">{{ $phone['name'] }}</a></h6>
					</div>
					<div class="info_item">
						<i class="fa fa-envelope"></i>
						<h6><a href="#">{{ $email['name'] }}</a></h6>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form" a method="post" id="contactForm" >
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" required class="form-control name" id="name" name="name" placeholder="Enter your name">
					</div>
					<div class="form-group">
						<input type="email" required class="form-control email" id="email" name="email" placeholder="Enter email address">
					</div>
					<div class="form-group">
						<input type="text" required class="form-control subject" id="subject" name="subject" placeholder="Enter Subject">
					</div>
				</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control message" required name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" value="submit" class="primary-btn"><span>Send Message</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection


@push('script')
<script type="text/javascript">

$('#contactForm').on('submit',function(event){
    event.preventDefault();

    name = $('.name').val();
    email = $('.email').val();
    mobile_number = $('.mobile_number').val();
    subject = $('.subject').val();
    message = $('.message').val();

    $.ajax({
      url: "{{route('contact.store')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        mobile_number:mobile_number,
        subject:subject, 
        message:message,
      },
      success:function(response){
        toastr.success(response.success);
        $('#contactForm').trigger('reset');
        $('.invalid-feedback').remove();
        // window.location.reload();


      },
       });
    });
  </script>
@endpush
