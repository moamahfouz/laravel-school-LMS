<div class="modal fade  bd-example-modal-lg" id="addItem" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Class <i class="fa fa-plus"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('schoolClass.classes.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Teacher:</label>
                                <select class="form-control" name="teacher_id">
                                    <option selected disabled> - Choose teacher - </option>
                                    @foreach($teachers  as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Description</label>
                                <textarea rows="6" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save class</button>
                </div>
            </form>

        </div>
    </div>
</div>

