@extends('layout.back-end.app')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/back-end/assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">

@endpush
@section('content')
<div class="col-md-12">
    <!-- Button trigger modal -->

  
 
  
    <!-- Default Elements -->
    <div class="block">
    <div class="panel-heading">
        <div class="panel-title"><h3>Messages List</h3></div>
      
    </div>
    <table  class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
     
            <th>Email</th>
            <th>Messages</th>
       
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $sl = 1; @endphp
        @foreach($messages as $data)
         <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $data->subject }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
              <strong>Name</strong>
              <p>{{ $data->name }}</p>
            </div>
            <div>
                <strong>Email</strong>
                <p>{{ $data->email }}</p>
              </div>
              <div>
                <strong>Messages</strong>
                <p>{{ $data->messages }}</p>
              </div>
          


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
        </div>
      </div>
    </div>
  </div>    
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$data->subject}}</td>
                <td>{{$data->email}}</td>
                <td class="text-center">
                   {{ $data->messages }}
                </td>
               
              
            
                <td>
                    <a href="{{ route('message.view',$data->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                        <i class="fa fa-eye"></i>
                      </a>
                    {{-- <a href="{{route('fileUpload.edit',$data->id)}}">
                        <button class="btn btn-xs btn-info edit"><i class="fa fa-eye"></i></button>
                    </a> --}}
                    {{-- <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}"
                       href="{{route('fileUpload.status',$data->id)}}"><i class="fa fa-refresh"></i></a> --}}
                    <a href="{{route('message.delete',$data->id)}}" data="{{$data->id}}"
                       class="btn btn-xs btn-danger delete-confirm" id="delete" type="button"><i
                            class="fa fa-trash"></i></a>


                         
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="pdf-viewer">

    </div>
    </div>
</div>

@endsection

@section('script')
        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/back-end/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/back-end/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('assets/back-end/assets/js/pages/be_tables_datatables.min.js')}}"></script>
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
                            window.location.href = "/admin/messages/list" ;
                        },
                    });
                }
            });
        });
    </script>
    
@endsection