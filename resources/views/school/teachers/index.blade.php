@extends('school.layouts.school_app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('layouts.flash')
        <!-- Page Heading -->

        <h1 class="h3 mb-2 text-gray-800">Teachers</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="float-right btn btn-success" data-toggle="modal" data-target="#addItem">Add Teacher <i class="fa fa-plus"></i> </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Image</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $idx=>$row)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td><img src="/images/teachers/{{$row->profile_picture}}" width="60"></td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->address}}</td>
                            <td>
                                <button onclick="destroy({{$row->id}})" class="btn btn-sm btn-danger">Delete <i class="fa fa-trash"></i> </button>
                                <a class="btn btn-sm btn-info" href="{{route('schoolTeacher.teachers.show', $row->id)}}">Edit <i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    @include('school.teachers.create')

    @section('scripts')
        <script>
            function destroy(id) {
                var rowid = id;
                swal({
                        title: "You are about to delete this teacher and his students and classes, Are you sure? :o",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, I'm sure.",
                        cancelButtonText: "No.",
                        closeOnConfirm: false,
                        confirmButtonColor: '#8CD4F5',
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location = "/school/teachers/del/" + rowid;
                            swal("Done!", " This teacher has been deleted! ", "success");

                        } else {
                            swal("Canceled", "Data is still safe now!", "error");
                        }
                    });


            }
        </script>
    @endsection
@endsection
