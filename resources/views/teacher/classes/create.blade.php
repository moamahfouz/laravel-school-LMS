<div class="modal fade  bd-example-modal-lg" id="addItem" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Task <i class="fa fa-plus"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('teacherClass.tasks.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="class_id" value="{{$row->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Task name:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">End date:</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">File:</label>
                                <input type="file" id="fileUpload" class="form-control" name="file">
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


