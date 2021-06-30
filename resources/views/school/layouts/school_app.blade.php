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
    <title>Welcome - {{auth('school')->user()->name}}</title>

    <link href="/admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="/admin_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/sweet-alert.css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">School Sys </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/school">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/school/teachers">
                <i class="fas fa-fw fa-list"></i>
                <span>Teachers</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/school/classes">
                <i class="fas fa-fw fa-users"></i>
                <span>Classes</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/school/students">
                <i class="fas fa-fw fa-users"></i>
                <span>Students</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth('school')->user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 src="/images/school.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('student.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

    @yield('content')


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; School sys 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="/admin_assets/vendor/jquery/jquery.min.js"></script>
<script src="/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin_assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/admin_assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/admin_assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="/js/select2.min.js"></script>
<script src="/js/sweet-alert.min.js"></script>
<!-- Page level custom scripts -->
<script src="/admin_assets/js/demo/datatables-demo.js"></script>

@yield('scripts')

</body>

</html>
