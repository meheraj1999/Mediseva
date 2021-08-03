@extends('layout.front-end.app')
@push('css')
 <style>
     .banner_area .banner_inner{
        min-height: 225px !important;
     }
     .banner_area{
        min-height: 274px;
     }
 </style>
@endpush
@section('content')
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-right text-light">
				<h3>Photo Gallery</h3>
				<div class="page_link">
					<a href="/">Home</a>
					<a href="javascript:void(0)">Photo Gallery</a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="gallery-area  gray-bg">
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">              
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <img src="" class="imagepreview" style="width: 100%;" >
            </div>
          </div>
        </div>
      </div>
	<div class="container">
        <div class="main-title">
           
            <h1 class="font-30">Photo Gallery</h1>
        </div>
		<div class="portfolio">
	
                    @php($photos = \App\Models\PhotoGallery::orderBy('prority','asc')->where('status',1)->get())
            @foreach ($photos as $photo)
            <a href="javascript:void(0)" class="card pop">
			    <div class="image">
                    <img src="{{ $photo->image }}" alt="" />
			    </div>
			</a>
            @endforeach
			     

		</div>
	</div>
</section>
@endsection
@push('script')
<script>
    $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
@endpush