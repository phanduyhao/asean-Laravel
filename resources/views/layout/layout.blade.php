<!DOCTYPE html>
<html lang="en">
<head>
</head>
@include('layout.head')
<body>
<div class="layout-site position-relative">
    <!-- header -->
@include('layout.header')
<!-- main -->
    @yield('content')
    <!-- footer -->
    @include('layout.footer')
</div>
@include('layout.foot')
</body>
</html>
