@extends('teacher.layouts.teacher_app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('layouts.flash')
        <!-- Page Heading -->

        <h1 class="h3 mb-2 text-gray-800">Classes</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My classes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Students</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($rows as $idx=>$row)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->teacher_id}}</td>
                            <td>
                                <a href="{{route('teacherClass.classes.show', $row->id)}}" class="btn btn-sm btn-success"> Show <i class="fa fa-eye"></i> </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
