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
			<div class="banner_content text-right ">
				<h3 class="text-light">Social Activities</h3>
				<div class="page_link">
					<a href="/">Home</a>
					<a href="javascript:void(0)">Social Activities</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="social-activites-area  gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12 m-auto">
				<div class="row">
                    @php($socialActivites = \App\Models\SocialActivites::orderBy('prority','asc')->where('status', 1)->get())
                    @foreach ($socialActivites as $socialActivite )
                    <div class="col-md-6">
						<div class="social-activites-content mb-5">
							<div class="main-title mb-5">
								<h1 class="font-23">{{ $socialActivite->title }}</h1>
							</div>
							<div class="social-activities-img text-center mb-2">
								<img src="{{ $socialActivite->image }}" alt="service" class="img-fluid">
							</div>
							<p>
                        {!! $socialActivite->description !!}
							</p>
						</div>
					</div>
                    @endforeach
					
					
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection