@extends('student.layouts.student')

@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
    @include('layouts.flash')
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Student Profile</h1>
        </div>

        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Your classes</h6>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class name</th>
                                </tr>
                                </thead>

                                <tbody>
                               @foreach($rows as $idx=>$row)
                                    <tr>
                                        <td>{{$idx+1}}</td>
                                        <td>{{$row->class->name}}</td>
                                    </tr>
                               @endforeach



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>

            <div class="col-lg-4 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="/images/students/{{$user->profile_picture}}" width="100px" class="img-fluid">
                        </div>
                        <div class="text-left">
                            <ul>
                                <li><i class="fa fa-phone"></i> {{$user->phone}}</li>
                                <li><i class="fa fa-envelope"></i> {{$user->email}}</li>
                            </ul>
                        </div>



                    </div>
                </div>

            </div>
        </div>




@endsection
