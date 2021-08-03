@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Update Hospital </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
                <form role="form" action="{{ route('depertment.update',$depertment->id) }}" method="post" enctype="multipart/form-data">
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
                    <label class="col-12" for="example-text-input">Depertment Name</label>
                    <div class="col-md-12">
                        <input type="text" required class="form-control" value="{{ $depertment->name }}" id="example-text-input" name="name" placeholder="Text..">
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="example-file-input">depertment Image Privew</label>
                    <div class="col-12">
                      
                                <center>
                                    <div class="fileinput-new thumbnail" style="height: 100px; width:200px">
                                        {{-- <img id="previmage" src="/{{$depertment->image }}" width="200" height="100"> --}}
                                        <img id="previmage" src="{{$depertment->image ? '/' . $depertment->image :  '/assets/images/album-image-1.jpg'}}"width="200" height="100">

                                    </div>
                                </center>
                                <label for="profile_photo" class="control-label">depertment Image*</label>
                                <input type="file" class="form-control" id="previmage" value="{{ $depertment->image }}" name="image" onchange="readURL(this);">
                           
                       
                    </div>
                </div>
             
           

                <div class="form-group row">
                    <label class="col-12" for="example-textarea-input">Description</label>
                    <div class="col-12">
                        <textarea class="form-control" id="editor" name="description" rows="6" placeholder="Content.."> {{ $depertment->description }}</textarea>
                    </div>
                </div>

              
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">Update</button>
                        <a class="btn btn-secondary"  href="{{ route('depertment.home') }}">Close</a>
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