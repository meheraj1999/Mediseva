@extends('layout.front-end.app')
@section('content')

<!-- Begin Header Area -->


<!-- Begin Breadcam Area -->
@php($config=\App\Models\Setting::where('type','singleBanner')->first())
<div class="breadcam-area breadcam-bg breadcam-overlay" style="background-image: url('/{{$config->value}}');">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="bradcam_text">
                    <h3>MBBS, MS(Urology)</h3>
                    <p>Sir Salimullaha Medical College, Mitford Hospital</p>
                    <p>Dhaka</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Doctor Details Area -->
<section class="single-hospital-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-doctor-list-wrap">
                    <div class="doctor-infos">
                        <a href="#">
                            <figure class="dc-docpostimg">
                                <img width="" height="" class="" src="/{{$data->image}}" alt="Velit Şenli">
                            </figure>
                        </a>
                        <div class="doctor-info-overview">
                            <h2 class="doctor-name">
                                <a href="javascript:void(0)">{{$data->name}}</a>
                            </h2>
                            <div class="doctor-degree">
                                {!!$data->description!!}
                            </div>
                            <div class="doctor-speciality">
                                Medicine, Heart, Diabetes, Rheumatology &amp; Pain Specialist
                            </div>
                        </div>
                    </div>
                </div>

                <div class="doctore-full-details-wrap">
                    <!-- Tab items -->
                    <div class="tabs">
                        <div class="tab-item active">
                            About
                        </div>
                        <div class="tab-item">
                            Education
                        </div>
                        <div class="tab-item">
                            Work Experience
                        </div>
                        <div class="line"></div>
                    </div>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <p>{{$data->about}}</p>
                        </div>
                        <div class="tab-pane">
                            <p>
                                {{$data->education}}</p>
                        </div>
                        <div class="tab-pane">
                            <p>{{$data->experiences}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hospital-page-right-sidebar box-shadow-1">
                    <aside class="single-sidebar-widget search-widget">
                        <h4 class="widget_title">Get Appointment</h4>
                        <form action="{{route('appoinment.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" placeholder='Patient Name'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'"
                                        Required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="number" placeholder='Mobile Number'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'"
                                        Required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="age" placeholder='Age'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Age'" Required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mr-2 mb-0">Gender :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" value="Male" name="gender"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" value="Female" name="gender"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="other" value="Other" name="gender"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="dob" placeholder='Patient Name'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @php($data=\App\Models\Depertment::where('status',1)->orderBy('name','asc')->get())

                                    <select class="form-control" name="depertment">
                                        <option>--Select Department--</option>
                                        @foreach($data as $dep)
                                        <option>{{$dep->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @php($doctor=\App\Models\Depertment::where('status',1)->orderBy('name','asc')->get())
                                    <select class="form-control" name="doctor_name">
                                        <option>--Select Doctor--</option>
                                        @foreach($doctor as $doc)
                                        <option>{{$doc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @php($hospital=\App\Models\Hospital::where('status',1)->orderBy('name','asc')->get())
                                    <select class="form-control" name="hospital">
                                        <option>--Hospital Name--</option>
                                        @foreach($hospital as $hos)
                                        <option>{{$hos->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mr-2 mb-0">Patient Type :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="new" name="type" value="new">
                                    <label class="custom-control-label" for="new">New</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="old" name="type" value="old">
                                    <label class="custom-control-label" for="old">OLD</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="others" name="type"
                                        value="others">
                                    <label class="custom-control-label" for="others">OTHER</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Comment" name="comment" class="form-control" rows="5"></textarea>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Get Appointment</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




@push('script')
<script type="text/javascript">
    const $ = document.querySelector.bind(document);
	const $$ = document.querySelectorAll.bind(document);

	const tabs = $$(".tab-item");
	const panes = $$(".tab-pane");

	const tabActive = $(".tab-item.active");
	const line = $(".tabs .line");

	line.style.left = tabActive.offsetLeft + "px";
	line.style.width = tabActive.offsetWidth + "px";

	tabs.forEach((tab, index) => {
	  const pane = panes[index];

	  tab.onclick = function () {
	    $(".tab-item.active").classList.remove("active");
	    $(".tab-pane.active").classList.remove("active");

	    line.style.left = this.offsetLeft + "px";
	    line.style.width = this.offsetWidth + "px";

	    this.classList.add("active");
	    pane.classList.add("active");
	  };
	});

</script>
@endpush