@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Hospital Slider </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
                <form role="form" action="{{ route('hospital.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="form-group row">
                    <label class="col-12" for="example-text-input">Name</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" id="example-text-input" name="name" placeholder="Text..">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12" for="example-file-input">hospital Icon Privew</label>
                    <div class="col-12">
                      
                                <center>
                                    <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                        <img id="previmage" src="/assets/images/album-image-1.jpg" width="140">
                                    </div>
                                </center>
                                <label for="profile_photo" class="control-label">hospital icon *</label>
                                <input type="file" class="form-control" id="previmage" name="image" onchange="readURL(this);">
                           
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-textarea-input">Location</label>
                    <div class="col-12">
                        <textarea class="form-control" id="editor" name="location" rows="6" placeholder="Content.."></textarea>
                    </div>
                </div>
           
                <div class="form-group row">
                    <label class="col-12" for="example-textarea-input">Description</label>
                    <div class="col-12">
                        <textarea class="form-control" id="abd" name="description" rows="6" placeholder="Content.."></textarea>
                    </div>
                </div>
         
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                   <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group row">
                    <label class="col-12" for="example-text-input">contact</label>
                    <div class="col-md-12">
                        <input type="number" name="contact" required class="form-control" id="example-text-input" name="name" placeholder="Text..">
                    </div>
             </div>

             <div class="form-group row">
                    <label class="col-12" for="example-text-input">Web site</label>
                    <div class="col-md-12">
                        <input type="text" name="site" required class="form-control" id="example-text-input" name="name" placeholder="Text..">
                    </div>
             </div>

                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">save</button>
                        <a class="btn btn-secondary"  href="{{ route('hospital.home') }}">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
@endsection
@section('script')
    <Script>
    


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage')
                        .attr('src', e.target.result)
                        .width(140)
                        .height(140);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </Script>
@endsection