<div class="modal fade  bd-example-modal-lg" id="addItem" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Teacher <i class="fa fa-plus"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('schoolTeacher.teachers.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Profile Pic:</label>
                            <input type="file" class="form-control" name="profile_picture">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Gender:</label>
                            <select name="gender" class="form-control">
                                <option selected disabled> - Choose gender - </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Phone:</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">DateOfBirth:</label>
                            <input type="date" class="form-control" name="dateofbirth">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save teacher</button>
            </div>
            </form>

        </div>
    </div>
</div>

