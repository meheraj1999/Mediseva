@extends('layout.back-end.app')

@section('content')
<div class="block">
  

    <div >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between pl-4 pr-4">
                        <div>
                            <h5><b>About Us</b></h5>
                        </div>
                    </div>
                </div>

                <form action="{{route('setting.aboutUpdate')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="about_us" id="editor" cols="30" rows="20" class="form-control">{{$about_us->value}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-block" type="submit" name="btn" value="submit">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


