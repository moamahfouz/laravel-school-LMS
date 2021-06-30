@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show text-center">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center">
        {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('message'))
    <div class="alert alert-info alert-dismissible fade show text-center">
        {!! session('message') !!}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center">
        {!! session('error') !!}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
