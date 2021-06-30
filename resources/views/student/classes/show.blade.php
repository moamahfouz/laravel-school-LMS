@extends('student.layouts.student')

@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
    @include('layouts.flash')
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$class->name}}</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Your marks</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>First</th>
                            <th>Mid</th>
                            <th>Final</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if(isset($marks))
                            <tr>
                                <td>{{$marks->first}}</td>
                                <td>{{$marks->mid}}</td>
                                <td>{{$marks->final}}</td>
                            </tr>
                                @endif



                        </tbody>
                    </table>
                </div>
            </div>

        </div>




@endsection
