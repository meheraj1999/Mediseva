@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">


    <div class="block p-4">
        <div class="card">
            <div class="card-header ">
                <h5 class="text-center mt-2">Home Video Upload</h5>
            </div>
            <div class="card-body" style="padding: 20px">

                @php($config=\App\Models\Setting::where('type','homeVideo')->first())
                <form action="{{route('setting.app',['homeVideo'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($config))


                    <div class="form-group mb-2">
                        <label style="padding-left: 10px">Home Video</label><br>
                        <input type="file" class="form-control" id="previmage" value="{{ $config['value'] }}"
                            name="image" onchange="readURL(this);">

                    </div>


                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary mb-2">Config</button>

                    @endif
                </form>
            </div>
            <section class="home-video-area bg-white py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 m-auto">
                            <video autoplay muted controls class="w-100 h-100">
                                @php($config=\App\Models\Setting::where('type','homeVideo')->first())

                                <source src="\{{ $config['value']}}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

@endsection