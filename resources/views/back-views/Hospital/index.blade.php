@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">
        <a href="{{route('hospital.create')}}" >
            <button class="btn btn-success mt-2 mb-2 mr-2" style="float: right ">+ Add New </button>
        </a>
        <div class="panel-title"><h3>hospital List</h3></div>
        <div class="panel-options">
           
        </div>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
     
            <th>Icon</th>
            
            <th>Location</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $sl = 1; @endphp
        @foreach($hospitalData as $data)
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$data->name}}</td>
              
                <td class="text-center"><img style="    width: 70px;
                    height: 40px;" src="/{{$data->image}}"></td>
               
                <td>{{$data->location}}</td>
                <td>{{$data->description}}</td>
           
              
                <td class="text-center">
                    <div
                        class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}
                    </div>
                </td>
                <td>
                    <a href="{{route('hospital.edit',$data->id)}}">
                        <button class="btn btn-xs btn-info edit"><i class="fa fa-pencil"></i></button>
                    </a>
                    <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}"
                       href="{{route('hospital.status',$data->id)}}"><i class="fa fa-refresh"></i></a>
                    <a href="{{route('hospital.delete',$data->id)}}" data="{{$data->id}}"
                       class="btn btn-xs btn-danger delete-confirm" id="delete" type="button"><i
                            class="fa fa-trash"></i></a>
                         
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            const id = $(this).attr('data');
          
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
          
                if (value) {
                    $.ajax({
                        url: url ,
                        data: id,
                        type: "delete",
                        dataType: "json",
                        success: function (response) {
                           
                            toastr.warning(" Deleted successfully", "!!!");
                            window.location.href = "/admin/hospital/" ;
                        },
                    });
                }
            });
        });
    </script>
@endsection