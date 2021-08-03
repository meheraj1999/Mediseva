@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Update doctor </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
                <form role="form" action="{{ route('doctor.update',$doctor->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
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
                        <input type="text" required class="form-control" value="{{ $doctor->name }}" id="example-text-input" name="name" placeholder="Text..">
                        
                    </div>
                </div>
             
           
                <div class="form-group row">
                    <label class="col-12" for="example-textarea-input">Description</label>
                    <div class="col-12">
                        <textarea class="form-control" id="editor" name="description" rows="6" placeholder="Content.."> {{ $doctor->description }}</textarea>
                    </div>
                </div>
               
            
               
               
                <div class="form-group row">
                    <label class="col-12" for="example-file-input">doctor Image Privew</label>
                    <div class="col-12">
                      
                                <center>
                                    <div class="fileinput-new thumbnail" style="height: 100px; width:200px">
                                        {{-- <img id="previmage" src="/{{$doctor->image }}" width="200" height="100"> --}}
                                        <img id="previmage" src="{{$doctor->image ? '/' . $doctor->image :  '/assets/images/album-image-1.jpg'}}"width="200" height="100">

                                    </div>
                                </center>
                                <label for="profile_photo" class="control-label">doctor Image*</label>
                                <input type="file" class="form-control" id="previmage" value="{{ $doctor->image }}" name="image" onchange="readURL(this);">
                           
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-text-input">Experience</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" value="{{ $doctor->experience }}" id="example-text-input" name="experience" placeholder="Text..">
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-text-input">Code</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" value="{{ $doctor->code }}" id="example-text-input" name="code" placeholder="Text..">
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-text-input">Time</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" value="{{ $doctor->time }}" id="example-text-input" name="time" placeholder="Text..">
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-text-input">Fees</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" value="{{ $doctor->fees }}" id="example-text-input" name="fees" placeholder="Text..">
                        
                    </div>
                </div>
              
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">Update</button>
                        <a class="btn btn-secondary"  href="{{ route('doctor.home') }}">Close</a>
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