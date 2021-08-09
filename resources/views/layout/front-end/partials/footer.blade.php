<footer class="footer">
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-4">
					<div class="footer_widget">
						<h3 class="footer_title">
							Service
						</h3>
						<ul>
                        @php($data=\App\Models\Service::where('status',1)->orderBy('title','asc')->limit(5)->get());
                        @foreach($data as $footer)
							<li><a href="{{route('service_details',$footer->id)}}">{{$footer->title}}</a></li>
					
                          @endforeach
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="footer_widget">
						<h3 class="footer_title">
							Useful Links
						</h3>
						<ul>
							<li><a href="#">About</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#"> Contact</a></li>
							<li><a href="#"> Appointment</a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4">
					 <div class="footer_widget">
						<h3 class="footer_title">
							Address
						</h3>
                        @php($config=\App\Helpers\Helper::get_app_settings('appAddress'))
						<p>
                            {{$config['name']}}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copy-right_text">
		<div class="container">
			<div class="footer_border"></div>
				<div class="row">
					<div class="col-xl-12">
					<p class="copy_right text-center">

					&copy;<script>document.write(new Date().getFullYear());</script> This template is made with by <a href="https://bizitbd.com/" target="_blank">BizitBd</a>

					</p>
				</div>
			</div>
		</div>
	</div>
</footer>