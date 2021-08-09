@extends('layout.back-end.app')
@section('content')
<div class="col-md-12">
    <!-- Default Elements -->
    <div class="block">

        <div class="panel-title">
            <h3>Appoinment List</h3>
        </div>
        <div class="panel-options">

        </div>
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Doctor Name</th>
                    <th>Depertment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @php $sl = 1; @endphp
                @foreach($appoinmentdata as $data)

                <div class="modal fade " id="exampleModal-{{$data->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Appoinment data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-2">
                                        <strong> Patient name:</strong>
                                        <p>{{$data->name}}</p>

                                    </div>


                                    <div class="col-md-2">
                                        <strong> Contact:</strong>
                                        <p>{{$data->contact}}</p>

                                    </div>


                                    <div class="col-md-2">
                                        <strong> Age:</strong>
                                        <p>{{$data->age}}</p>

                                    </div>


                                    <strong> Gender:</strong>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <p>{{$data->gender}}</p>


                                    </div>

                                    <div class="col-md-2">
                                        <strong> Date of Birth:</strong>
                                        <p>{{$data->dob}}</p>

                                    </div>

                                    <div class="col-md-2">
                                        <strong> Depertment:</strong>
                                        <p>{{$data->depertment}}</p>


                                    </div>

                                    <div class="col-md-2">
                                        <strong> Doctor:</strong>
                                        <p>{{$data->doctor_name}}</p>


                                    </div>


                                    <div class="col-md-2">
                                        <strong> Hospital:</strong>
                                        <p>{{$data->hospital}}</p>


                                    </div>

                                    <div class="col-md-2">
                                        <strong>Patient Type :</strong>
                                        <p>{{$data->type}}</p>

                                    </div>


                                    <div class="col-md-2">
                                        <strong> Comment:</strong>
                                        <p>{{$data->comment}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
    </div>
</div>
<tr>
    <td>{{$sl++}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->number}}</td>
    <td>{{$data->doctor_name}}</td>
    <td>{{$data->depertment}}</td>

    <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$data->id}}">
            <i class="fa fa-eye"></i>
        </button>


        <a href="{{route('appoinment.delete',$data->id)}}" data="{{$data->id}}"
            class="btn btn-xs btn-danger delete-confirm" id="delete" type="button"><i class="fa fa-trash"></i></a>

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