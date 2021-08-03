@extends('layout.front-end.app')
@section('content')

<section class="notice-area  gray-bg">
	<div class="container">
        <div class="main-title">
           
            <h1 class="font-30">Notice</h1>
        </div>
		<div class="row justify-content-center">
			<div class="col-lg-8 text-justify">
				<div class="notice-box box-shadow-1">
                    @php($notic = \App\Models\Setting::where('type','our_vision')->first())
					<p class="mb-0">
                        {!! $notic->value !!}
					</p>
				</div>
			</div>
		</>
	</div>
</section>
@endsection