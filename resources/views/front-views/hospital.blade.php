@extends('layout.front-end.app')
@section('content')


<!-- Begin Header Area -->


<!-- Hospital Page search area -->
<div class="medi-search-area section-bg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <form class="medi-search-form">
                    <input type="text" id="box" placeholder="Hospital Search.." class="search__box">
                    <i class="fa fa-search search__icon" id="icon" onclick="toggleShow()"></i>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Hospital List Area -->
<div class="home-doctor-list-area section-bg section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="medi-sidebar-filter-wrap">
                    <div class="card box-shadow-1">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <a href="#" class="d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <span>All Division</span> <i class="ti-panel"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body p-xl-4">
                                <form id="SortingForm2" method="post">
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation">
                                        <label class="custom-control-label sdesignation" for="d0">Dhaka</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Medicin">
                                        <label class="custom-control-label sdesignation" for="d1">Barisal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Dentistr">
                                        <label class="custom-control-label sdesignation" for="d2">Chittagong</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Orthopaedic ">
                                        <label class="custom-control-label sdesignation" for="d3">Khulna  </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Neuromedicin">
                                        <label class="custom-control-label sdesignation" for="d4">Rajshahi</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Cancer (Oncology)">
                                        <label class="custom-control-label sdesignation" for="d5">Rangpur </label>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                    <div class="my-3"></div>
                    <div class="card box-shadow-1">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <a href="#" class="d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <span>District</span> <i class="ti-panel"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body p-xl-4">
                                <form id="SortingForm2" method="post">
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation">
                                        <label class="custom-control-label sdesignation" for="d0">Bagerhat</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Medicin">
                                        <label class="custom-control-label sdesignation" for="d1">Bandarban</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Dentistr">
                                        <label class="custom-control-label sdesignation" for="d2">Barguna</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Orthopaedic ">
                                        <label class="custom-control-label sdesignation" for="d3">Barisal  </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Neuromedicin">
                                        <label class="custom-control-label sdesignation" for="d4">Bhola</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Cancer (Oncology)">
                                        <label class="custom-control-label sdesignation" for="d5">Bogra</label>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                    @foreach($hospitalData as $data)
                        <div class="single-hospital-list-wrap box-shadow-1">
                            <div class="hospital-infos">
                                <a href="#">
                                    <figure class="dc-docpostimg">
                                        <img width="" height="" class=""src="/{{$data->image}}" alt="Velit Şenli">
                                    </figure>
                                </a>
                                <div class="hospital-info-overview">
                                    <h2 class="hospital-name">
                                        <a href="javascript:void(0)">{{$data->name}}  </a>
                                    </h2>
                                    <div class="hospital-location">
                                        <address class="h-list_address">
                                           {!!$data->location!!}
                                        </address>
                                    </div>
                                    <p class="hospital-description mb-2">{{$data->description}}</p>
                                    <div class="dc-btnarea">
                                        <a href="{{route('details',$data->id)}}" class="dc-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
<script type="text/javascript">
    function toggleShow () {
      var el = document.getElementById("box");
      el.classList.toggle("show");
    }
</script>
@endpush
