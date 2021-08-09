@extends('layout.front-end.app')
@section('content')
<div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8">

        <div class="hospital-page-right-sidebar box-shadow-1">
            <aside class="single-sidebar-widget search-widget">
                <h4 class="widget_title">Get Appointment</h4>
                <form action="{{route('appoinment.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder='Patient Name'
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'" Required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="number" placeholder='Mobile Number'
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" Required>
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
                            <input type="radio" id="male" value="Male" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" value="Female" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="other" value="Other" name="gender" class="custom-control-input">
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
                            <input type="radio" class="custom-control-input" id="others" name="type" value="others">
                            <label class="custom-control-label" for="others">OTHER</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea placeholder="Comment" name="comment" class="form-control" rows="5"></textarea>
                    </div>
                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Get
                        Appointment</button>
                </form>
            </aside>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection