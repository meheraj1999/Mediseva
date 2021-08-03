@extends('layout.front-end.app')
@section('content')
<section class="gallery-area  gray-bg">
 
	<div class="container">
        <div class="main-title">
           
            <h1 class="font-30">Download File</h1>
        </div>
	    <div class="col-12 py-2">
            <div class="row">
                @php($file = \App\Models\PdfDownload::where('status',1)->orderBy('id','desc')->get())
                @foreach ($file as $f )
                <div class="col-6 mt-1 mb-2">
                    <div class="card  py-3">
                        <div class="row">
                            <div class="col-md-8">
                                 <p style="font-size: 20px;" class="ml-3">{{ $f->title }}</p>
                                </div>
                           <div class="col-2 justify-center">   <a target="_blnck"  href="{{ route('pdf.show', $f->id) }}" class="btn btn-success ">Download</a></div>
                          
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
	</div>
</section>
@endsection