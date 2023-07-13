<!DOCTYPE html>



<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title') </title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />







    @yield('styles')





    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />


    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}" />




    <!-- FAVICON -->
    <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>


    <div id="toaster"></div>


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">Auth Dashboard</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>









                        <li class="section-title">
                            Apps
                        </li>





                        <li>
                            <a class="sidenav-item-link" href="{{ route('auth.categories') }}">
                                <i class="fas fa-bars"></i>
                                <span class="nav-text">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('auth.tags') }}">
                                <i class="fas fa-tags"></i>
                                <span class="nav-text">Tags</span>
                            </a>
                        </li>
{{--                                              posts --}}
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#email" aria-expanded="false" aria-controls="email">
                                <i class="mdi mdi-image-filter-none "></i>
                                <span class="nav-text">Posts</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email" data-parent="#sidebar-menu">
                                <div class="sub-menu">



                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('posts.create') }}">
                                            <span class="nav-text">Create Post</span>

                                        </a>
                                    </li>






                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('posts.index') }}">
                                            <span class="nav-text">Posts</span>

                                        </a>
                                    </li>






                                </div>
                            </ul>
                        </li>





            </div>
        </aside>
        <div class="page-wrapper">
            <!-- Header -->

            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Vestibulum at eros</a>
                                </li>

                            </ul>

                        </div>

                        <ul class="nav navbar-nav">
                            <!-- Offcanvas -->
                            <li class="custom-dropdown">
                                <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas="contact-off"
                                    href="javascript:">
                                    <i class="mdi mdi-contacts icon"></i>
                                </a>
                            </li>

                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" />

                                    <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{ route('auth.profile.index') }}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="email-inbox.html">
                                            <i class="mdi -outline"></i>
                                            <span class="nav-text">Message</span>
                                            <span class="badge badge-pill badge-primary">24</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">

                                        <form id="logout-form" method="POST" action="{{ route('logout')}}">
                                            @csrf

                                            <a id="logout-button" class="dropdown-link-item" href="javascript:void(0)">
                                                <i class="mdi mdi-logout"></i> Log Out </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
            {{-- content here --}}
            @yield('content')






            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
        <!-- Card Offcanvas -->





        <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>

        <script src="{{ asset('assets/auth/js/mono.js') }}"></script>

        <script src="{{ asset('assets/auth/js/custom.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('#logout-button').click(function(){
                    $('#logout-form').submit();
                });
            });
        </script>


        @yield('scripts')

        <!--  -->


</body>

</html>
