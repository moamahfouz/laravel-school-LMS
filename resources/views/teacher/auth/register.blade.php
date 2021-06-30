

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Teacher - Login</title>

    <link href="/admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-login-image{
            background: url('/images/teacher_login.jpg');
            background-position: center;
            background-size: cover;
        }
    </style>

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register a new account</h1>
                                </div>
                                <form method="POST" action="{{ route('teacher.register') }}" aria-label="{{ __('Register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="name" placeholder="Enter your name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" placeholder="Enter Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input placeholder="Enter your phone" class="form-control" type="text" name="phone" required>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <?php
                                                $schools = DB::table('schools')->get();
                                            ?>
                                            <select class="form-control" name="school_id">
                                                <option selected disabled> - Choose school - </option>
                                                @foreach($schools as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="gender">
                                                <option selected disabled> - Choose Gender - </option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" placeholder="Enter password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password-confirm" placeholder="Reenter password" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/teacher/login">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="/admin_assets/vendor/jquery/jquery.min.js"></script>
<script src="/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin_assets/js/sb-admin-2.min.js"></script>

</body>

</html>






{{--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

--}}
