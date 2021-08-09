@extends('layout.back-end.app')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="text-center mt-2">Banner</h5>
                    </div>
                    <div class="card-body" style="padding: 20px">

                        @php($banner=\App\Models\Setting::where('type','mainBanner')->first())

                        <form action="{{route('banner.app',['mainBanner'])}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($banner))

                            <img src="/{{$banner->value}}" alt="" height="150" width="300" style="margin-left: 67px;
                            border-radius: 10px;">
                            <div class="form-group mb-2">

                                <label style="padding-left: 10px">Banner</label><br>
                                <input type="file" class="form-control" name="image" value="" required>
                            </div>


                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary mb-2">Config</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="text-center mt-2">Single Banner</h5>
                    </div>
                    <div class="card-body" style="padding: 20px">

                        @php($banner=\App\Models\Setting::where('type','singleBanner')->first())
                        <form action="{{route('banner.app',['singleBanner'])}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($banner))

                            <img src="/{{$banner->value}}" alt="" height="150" width="300" style="margin-left: 67px;
                            border-radius: 10px;">
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Single Banner</label><br>
                                <input type="file" class="form-control" name="image" value="" required>
                            </div>


                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary mb-2">Config</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">

        <div class="col-md-6">
            <div class="block">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="text-center mt-2">Footer Banner</h5>
                    </div>
                    <div class="card-body" style="padding: 20px">

                        @php($banner=\App\Models\Setting::where('type','footerBanner')->first())
                        <form action="{{route('banner.app',['footerBanner'])}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($banner))

                            <img src="/{{$banner->value}}" alt="" height="150" width="300" style="margin-left: 67px;
                            border-radius: 10px;">
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Footer Banner</label><br>
                                <input type="file" class="form-control" name="image" value="" required>
                            </div>


                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary mb-2">Config</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection