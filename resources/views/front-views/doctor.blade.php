@extends('layout.front-end.app')
@section('content')



<!-- Begin Header Area -->


<!-- Doctor Page search area -->
<div class="medi-search-area section-bg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <form class="medi-search-form">
                    <input type="text" id="box" placeholder="Doctor Search.." class="search__box">
                    <i class="fa fa-search search__icon" id="icon" onclick="toggleShow()"></i>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Doctor List Area -->
<div class="home-doctor-list-area section-bg section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="medi-sidebar-filter-wrap">
                    <div class="card box-shadow-1">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <a href="#" class="d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <span>Department wise</span> <i class="ti-panel"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body p-xl-4">
                                <form id="SortingForm2" method="post">
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation">
                                        <label class="custom-control-label sdesignation" for="d0">Cardiology</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Medicin">
                                        <label class="custom-control-label sdesignation" for="d1">Medicine</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Dentistr">
                                        <label class="custom-control-label sdesignation" for="d2">Dentistry</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Orthopaedic ">
                                        <label class="custom-control-label sdesignation" for="d3">Orthopaedic  </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Neuromedicin">
                                        <label class="custom-control-label sdesignation" for="d4">Neuromedicine</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Cancer (Oncology)">
                                        <label class="custom-control-label sdesignation" for="d5">Cancer (Oncology) </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Gynecolog">
                                        <label class="custom-control-label sdesignation" for="d6">Gynecology</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Pediatrics (CHILD">
                                        <label class="custom-control-label sdesignation" for="d7">Pediatrics (CHILD)</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Cardio thoracic Surgery">
                                        <label class="custom-control-label sdesignation" for="d8">Cardio thoracic Surgery </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Cardio - Vascular Surgery">
                                        <label class="custom-control-label sdesignation" for="d9">Cardio - Vascular Surgery </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Vascular Surgery ">
                                        <label class="custom-control-label sdesignation" for="d10">Vascular Surgery </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="ENT">
                                        <label class="custom-control-label sdesignation" for="d11">ENT</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Gastroenterology ">
                                        <label class="custom-control-label sdesignation" for="d12">Gastroenterology </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="General surgery">
                                        <label class="custom-control-label sdesignation" for="d13">General surgery</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Plastic Surgery">
                                        <label class="custom-control-label sdesignation" for="d14">Plastic Surgery</label>
                                    </div>
                                     <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Physical Medicine ">
                                        <label class="custom-control-label sdesignation" for="d15">Physical Medicine </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Diabetes &amp; Endocrinology ">
                                        <label class="custom-control-label sdesignation" for="d16">Diabetes &amp; Endocrinology </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Nephrology  (Kidney)">
                                        <label class="custom-control-label sdesignation" for="d17">Nephrology  (Kidney)</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Neuro-Surgery">
                                        <label class="custom-control-label sdesignation" for="d18">Neuro-Surgery</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="EYE">
                                        <label class="custom-control-label sdesignation" for="d19">EYE</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Physiotherapy ">
                                        <label class="custom-control-label sdesignation" for="d20">Physiotherapy </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Skin &amp; VD">
                                        <label class="custom-control-label sdesignation" for="d21">Skin &amp; VD</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Urology">
                                        <label class="custom-control-label sdesignation" for="d22">Urology</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="General Physician ">
                                        <label class="custom-control-label sdesignation" for="d23">General Physician </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Nutritionest ">
                                        <label class="custom-control-label sdesignation" for="d24">Nutritionest </label>
                                    </div>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input sdesignation" value="Herbal">
                                        <label class="custom-control-label sdesignation" for="d25">Herbal</label>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            @foreach($doctorData as $data)
                <div class="single-doctor-list-wrap">
                    <div class="row">
                        <div class="col-md-8 no-padding">
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
                                       
                                    </div>
                                    <div class="doctor-clinic-name"></div>
                                    <p class="doctor-description mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="doctor-info-overview2">
                                <span><i class="ti-direction-alt"></i>{{$data->experience}} </span>
                                <span><i class="ti-thumb-up"></i>{{$data->code}}</span>
                                <span><i class="ti-wallet"></i>{{$data->time}}</span>
                                <span><i class="ti-wallet"></i>{{$data->fees}}</span>
                                <div class="dc-btnarea">
                                    <a href="{{route('doc_details',$data->id)}}" class="dc-btn">Book Appointment</a>
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



