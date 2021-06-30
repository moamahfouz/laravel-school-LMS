<div class="modal fade  bd-example-modal-lg" id="editMark" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit student marks <i class="fa fa-pen"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('teacherMarks.marks.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="class_id" value="{{$row->id}}">
                <input type="hidden" name="student_id" id="student_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Student name:</label>
                                <input disabled type="text" class="form-control" id="student_name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Class name:</label>
                                <input type="text" disabled class="form-control" id="className">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">First:</label>
                                <input type="text" class="form-control" id="first_val" name="first">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Mid:</label>
                                <input type="text" class="form-control" id="mid_val" name="mid">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Finial:</label>
                                <input type="text" class="form-control" id="final_val" name="final">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save marks</button>
                </div>
            </form>

        </div>
    </div>
</div>

@section('scripts')
    <script>
        $('#fileUpload').on( 'change', function() {
            myfile= $( this ).val();
            var ext = myfile.split('.').pop();
            if(ext=="pdf" || ext=="ppt" || ext=="pptx"){
                console.log('file has been added')
            } else{
                alert('This file format is not allowed');
                $( this ).val('');
            }
        });

        function editMark(id, name, className){

            $.ajax({
                url: '{{route('getMarksPerStudent')}}',
                data: {
                    'id': id,
                    '_token': '{{csrf_token()}}',
                },
                type: 'post',
                success: (res)=>{
                    $('#first_val').val(res.first);
                    $('#mid_val').val(res.mid);
                    $('#final_val').val(res.final);
                },
                error: (e)=>{
                    alert('Something goes wrong!')
                },
            })

            $('#student_id').val(id);
            $('#student_name').val(name);
            $('#className').val(className);
        }


    </script>
@endsection
