@extends('layout.back-end.app')
@section('content')

<div class="col-md-12">
    <div class="row">
       <div class="col-md-6">
           <div class="block">
           <div class="card">
               <div class="card-header ">
                   <h5 class="text-center mt-2">App Phone</h5>
               </div>
               <div class="card-body" style="padding: 20px">
   
                   @php($config=\App\Helpers\Helper::get_app_settings('appPhone'))
                   <form
                       action="{{route('setting.app',['appPhone'])}}"
                       method="post">
                       @csrf
                       @if(isset($config))
   
                          
                           <div class="form-group mb-2">
                               <label style="padding-left: 10px">App Phone</label><br>
                               <input type="text" class="form-control" name="name" value="{{$config['name']}}"
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
       <div class="col-md-6">
           <div class="block">
           <div class="card">
               <div class="card-header ">
                   <h5 class="text-center mt-2">App Address</h5>
               </div>
               <div class="card-body" style="padding: 20px">
   
                   @php($config=\App\Helpers\Helper::get_app_settings('appAddress'))
                   <form
                       action="{{route('setting.app',['appAddress'])}}"
                       method="post">
                       @csrf
                       @if(isset($config))
   
                          
                           <div class="form-group mb-2">
                               <label style="padding-left: 10px">App Address</label><br>
                               <input type="text" class="form-control" name="name" value="{{$config['name']}}"
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
    </div>
   </div>
   <div class="col-md-12">
    <div class="row">
      
       <div class="col-md-6">
           <div class="block">
           <div class="card">
               <div class="card-header ">
                   <h5 class="text-center mt-2">App Email</h5>
               </div>
               <div class="card-body" style="padding: 20px">
   
                   @php($config=\App\Helpers\Helper::get_app_settings('appEmail'))
                   <form
                       action="{{route('setting.app',['appEmail'])}}"
                       method="post">
                       @csrf
                       @if(isset($config))
   
                          
                           <div class="form-group mb-2">
                               <label style="padding-left: 10px">App Email</label><br>
                               <input type="text" class="form-control" name="name" value="{{$config['name']}}"
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
    </div>
   </div>
   @endsection
