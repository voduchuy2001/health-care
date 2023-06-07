<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <base href="/">
    <meta charset="utf-8" />
    <title>Trang quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('admin.layouts.css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    @include('admin.components.header')

    @include('admin.components.left-sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                   @yield('content')

                </div>
            </div>
        </div>
    </div>

    @include('admin.components.back-to-top')

    @include('admin.components.loader')
    
    @include('admin.components.settings')

    @include('admin.layouts.javascript')
</body>
</html>