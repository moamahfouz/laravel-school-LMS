<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title> لوحة المدرس - </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="icon" href="/spa/img/fevicon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/teacher/styles.css">

</head>

<body>
<div class="app">
    <aside class="nav">
        <div class="burger">
            <span class="line"></span>
        </div>
        <div class="nav__logo">
            <img src="https://assets.codepen.io/2709552/logo_1.svg"/>
        </div>
        <ul class="menu">
            <li class="menu__item">
                <span class="menu__icon"><i class="fa fa-home"></i></span>
                الرئيسية
            </li>

            <li class="menu__item">
                <span class="menu__icon"><i class="fa fa-video"></i></span>
                الفيديوهات
            </li>

            <li class="menu__item">
                <span class="menu__icon"><i class="fa fa-users"></i></span>
                المجموعات
            </li>

            <li class="menu__item">
                <span class="menu__icon"><i class="fa fa-newspaper"></i></span>
                الإمتحانات
            </li>


        </ul>
        <div class="nav__logout">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::guard('teacher')->user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('teacher.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

            <li class="menu__item">

                <a class="nav__link" href="#">
                    <span class="icon">
                        <svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.736 7.5h-4.6v3h4.6V15l7.668-6-7.668-6v4.5z" fill="#A4A8BD"/>
                            <path d="M3.07 3h6.133V0H3.069C2.256 0 1.476.316.901.879A2.967 2.967 0 00.003 3v12c0 .796.323 1.559.898 2.121A3.102 3.102 0 003.069 18h6.134v-3H3.069V3z"
                                  fill="#A4A8BD"/>
                        </svg> </span>تسجيل الخروج</a>
            </li>


        </div>
    </aside>

    @yield('content')



</div>


<script>
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".nav");

    burger.addEventListener("click", () => {
        burger.classList.toggle("is-open");
        nav.classList.toggle("is-open");
    });

</script>


</body>

</html>


