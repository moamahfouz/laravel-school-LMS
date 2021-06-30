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
                {{$row->name}}
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{route('schoolTeacher.teachers.update', $row->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" value="{{$row->name}}" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="email" value="{{$row->email}}" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Gender:</label>
                                        <select name="gender" class="form-control">
                                            <option selected disabled> - Choose gender - </option>
                                            <option {{($row->gender == 'male') ? 'selected' : ''}} value="male">Male</option>
                                            <option {{($row->gender == 'female') ? 'selected' : ''}} value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Phone:</label>
                                        <input type="text" value="{{$row->phone}}" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">DateOfBirth:</label>
                                        <input type="date" value="{{$row->dateofbirth}}" class="form-control" name="dateofbirth">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Address:</label>
                                        <input type="text" value="{{$row->address}}" class="form-control" name="address">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save teacher</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


@endsection
