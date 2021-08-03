@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Update Slider </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
                <form role="form" action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
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
                    <label class="col-12" for="example-text-input">Title</label>
                    <div class="col-md-12">
                        <input type="text"  class="form-control" value="{{ $slider->title }}" id="example-text-input" name="title" placeholder="Text..">
                        
                    </div>
                    <div class="col-md-12">
                          
                            
                        <label class="col-12" for="example-text-input" >Priority</label>
                     
                        <input type="number" required  class="form-control" id="example-text-input" name="prority" value="{{$slider->prority}}" placeholder="insert priority id..">
                        
                    </div>
                </div>
             
           
                <div class="form-group row">
                    <label class="col-12" for="example-textarea-input">Description</label>
                    <div class="col-12">
                        <textarea class="form-control" id="example-textarea-input" value="{{ $slider->description }}" name="description" rows="6" placeholder="Content.."></textarea>
                    </div>
                </div>
               
            
               
               
                <div class="form-group row">
                    <label class="col-12" for="example-file-input">Slider Image Privew</label>
                    <div class="col-12">
                      
                                <center>
                                    <div class="fileinput-new thumbnail" style="height: 100px; width:200px">
                                        {{-- <img id="previmage" src="/{{$slider->image }}" width="200" height="100"> --}}
                                        <img id="previmage" src="{{$slider->image ? '/' . $slider->image :  '/assets/images/album-image-1.jpg'}}"width="200" height="100">

                                    </div>
                                </center>
                                <label for="profile_photo" class="control-label">Slider Image*</label>
                                <input type="file"  class="form-control" id="previmage" value="{{ $slider->image }}" name="image" onchange="readURL(this);">
                           
                       
                    </div>
                </div>
              
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">Update</button>
                        <a class="btn btn-secondary"  href="{{ route('slider.home') }}">Close</a>
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