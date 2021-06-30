@extends('teacher.layouts.teacher_app')

@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
    @include('layouts.flash')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$row->name}}</h1>
            <button class="float-right btn btn-success" data-toggle="modal" data-target="#addItem"> Add Task <i class="fa fa-plus"></i> </button>
        </div>

        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Last tasks</h6>
                    </div>
                    <div class="card-body">
                        @foreach($tasks as $task)
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action">
                                {{$task->name}} <span class="float-right">{{$task->end_date}}</span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>


            </div>

            <div class="col-lg-4 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Last added files</h6>
                    </div>
                    <div class="card-body">
                        @foreach($tasks as $task)
                            @if($task->file != null)
                        <a href="/images/files/{{$task->file}}" class="btn btn-secondary btn-block btn-icon-split">
                            <span class="text">{{$task->file}} <i class="fas fa-download fa-sm text-white-50"></i></span>
                        </a>
                            @endif
                        @endforeach

                    </div>
                </div>

            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Class Students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Class name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($classStudents as $idx=>$student)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$student->student->name}}</td>
                            <td>{{$student->class->name}}</td>
                            <td>
                                <button onclick="editMark({{$student->student->id}}, '{{$student->student->name}}', '{{$row->name}}')" data-toggle="modal" data-target="#editMark" class="btn btn-sm btn-success">Edit marks <i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

    </div>



    @include('teacher.classes.create')
    @include('teacher.classes.edit_mark')

@endsection
