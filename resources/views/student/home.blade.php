@extends('student.layouts.student')

@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
    @include('layouts.flash')
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My classes</h1>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Classes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Class name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($rows as  $idx=>$row)
                            <tr>
                                <td>{{$idx+1}}</td>
                                <td>{{$row->class->name}}</td>
                                <td>
                                    <a href="/student/classes/{{$row->class_id}}" class="btn btn-sm btn-success">
                                        Show <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>




@endsection
