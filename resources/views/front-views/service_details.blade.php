@extends('layout.front-end.app')
@section('content')

<!-- Begin Header Area -->


<!-- Begin Breadcam Area -->
<div class="breadcam-area breadcam-bg breadcam-overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
                                <a href="javascript:void(0)">{{$data->title}}</a>
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


            </div>
        </div>
</section>
@endsection