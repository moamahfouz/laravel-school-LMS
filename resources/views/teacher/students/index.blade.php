@extends('teacher.layouts.teacher_app')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('layouts.flash');
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Students</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>
                        </thead>

                       <tbody>
                       @foreach($rows as $idx=>$row)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$row->name}}</td>
                            <td><img src="/images/students/{{$row->profile_picture}}" width="60"> </td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
