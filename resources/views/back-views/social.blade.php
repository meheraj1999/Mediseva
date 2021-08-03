@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
 
        <div class="block">
        <div class="card">
            <div class="card-header ">
                <h5 class="text-center mt-2">Social Link Update</h5>
            </div>
            <div class="card-body" style="padding: 20px">

                @php($config=\App\Helpers\Helper::get_business_settings('social'))
                <form
                    action="{{route('setting.socialLink',['social'])}}"
                    method="post">
                    @csrf
                    @if(isset($config))

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">Facebook</label><br>
                            <input type="text" class="form-control" name="facebook" value="{{$config['facebook']}}"
                                   required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">Whatsapp</label><br>
                            <input type="text" class="form-control" name="whatsapp" value="{{$config['whatsapp']}}"
                                   required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">Instagram</label><br>
                            <input type="text" class="form-control" name="instagram" value="{{$config['instagram']}}"
                                   required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">Linkdin</label><br>
                            <input type="text" class="form-control" name="linkdin" value="{{$config['linkdin']}}"
                                   required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">Twiter</label><br>
                            <input type="text" class="form-control" name="twiter" value="{{$config['twiter']}}"
                                   required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">You Tube</label><br>
                            <input type="text" class="form-control" name="youtube" value="{{$config['youtube']}}"
                                   required>
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

@endsection
