@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block p-4">
        <a href="{{route('socialActivite.create')}}" >
            <button class="btn btn-success mt-2 mb-2 mr-2" style="float: right ">+ Add New </button>
        </a>
        <div class="panel-title"><h3>Social Activites List</h3></div>
        <div class="panel-options">
           
        </div>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
     
            <th>Picture</th>
           <th>Prority</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $sl = 1; @endphp
        @foreach($SliderData as $data)
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$data->title}}</td>
              
                <td class="text-center"><img style="    width: 246px;
                    height: 90px;" src="/{{$data->image}}"></td>
                    
                    
                </td>
                   
           <td>{{ $data->prority}}</td>
                <td class="text-center">
                    <div
                        class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}
                    </div>
                </td>
                <td>
                    <a href="{{route('socialActivite.edit',$data->id)}}">
                        <button class="btn btn-xs btn-info edit"><i class="fa fa-pencil"></i></button>
                    </a>
                    <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}"
                       href="{{route('socialActivite.status',$data->id)}}"><i class="fa fa-refresh"></i></a>
                    <a href="{{route('socialActivite.delete',$data->id)}}" data="{{$data->id}}"
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
                            window.location.href = "/admin/socialActivite/" ;
                        },
                    });
                }
            });
        });
    </script>
@endsection