<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Admin Dashboard</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors/blue.css') }}" id="theme" rel="stylesheet">
    @yield('styles')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin-index') }}"><b>
                        <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>
                    </b><span>
                         <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage"/></span>
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                    class="profile-pic m-r-10"/>Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li><a class="waves-effect waves-dark" href="{{ route('admin-index') }}" aria-expanded="false"><i
                                    class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li><a class="waves-effect waves-dark" href="{{ route('admin-users') }}" aria-expanded="false"><i
                                    class="mdi mdi-account"></i><span class="hide-menu">User management</span></a>
                    </li>
                    <li><a class="waves-effect waves-dark" href="{{ route('admin-groups') }}" aria-expanded="false"><i
                                    class="mdi mdi-account-multiple"></i><span class="hide-menu">Group management</span></a>
                    </li>
                </ul>
                <div class="text-center m-t-30">

                </div>
            </nav>
        </div>

    </aside>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{$currentPage}}</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">

                </div>
            </div>
            @yield('content')
        </div>
        <footer class="footer"> © 2017 Manicheva Svetlana</footer>
    </div>
</div>

@yield('scripts')

</body>

</html>
