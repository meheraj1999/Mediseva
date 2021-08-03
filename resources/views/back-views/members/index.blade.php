@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block p-4">
        <a href="{{route('members.create')}}" >
            <button class="btn btn-success mt-2 mb-2 mr-2" style="float: right ">+ Add New </button>
        </a>
        <div class="panel-title">
            @if(Request::is('admin/members/list/0'))
            <h3>Executive Committee</h3>
            @elseif(Request::is('admin/members/list/1'))
            <h3>Honor Board</h3>
            @elseif(Request::is('admin/members/list/2'))
            <h3>Members</h3>
            @elseif(Request::is('admin/members/list/3'))
            <h3>Donor</h3>
            @endif
          

        <div class="panel-options">
           
        </div>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
     
            <th>Picture</th>
            @if(Request::is('admin/members/list/2'))
          
            @endif
            @if(Request::is('admin/members/list/1'))
            <th>Secretary</th>
            @else
            <th>Designtion</th>
            @endif
            <th>Priority</th>

            <th>
                @if(Request::is('admin/members/list/1'))
                Sec Img
                @else
                Status
                @endif
            </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $sl = 1; @endphp
        @foreach($members as $data)
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$data->name}}</td>
              
                <td class="text-center"><img style="width: 104px;
                    height: 102px;
                    border-radius: 50%;" src="/{{$data->image? $data->image : 'assets/front-end/img/blank.png'}}"></td>  
            
              <td> {{ $data->designation }}</td>
              
           <td>{{ $data->priority}}</td>
                <td class="text-center">
                    @if ($data->type == 1)
                    <img style="width: 104px;
                    height: 102px;
                    border-radius: 50%;" src="/{{$data->details? $data->details['sec_image'] : 'assets/front-end/img/blank.png'}}"></td>  
            
                        @else
                        <div class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}
                        </div>
                    @endif
                   
                </td>
                <td>
                    <a href="{{route('members.edit',$data->id)}}">
                        <button class="btn btn-xs btn-info edit"><i class="fa fa-pencil"></i></button>
                    </a>
                    <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}"
                       href="{{route('members.status',$data->id)}}"><i class="fa fa-refresh"></i></a>
                    <a href="{{route('members.delete',$data->id)}}" data="{{$data->id}}"
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
                            location.reload();
                        },
                    });
                }
            });
        });
    </script>
@endsection