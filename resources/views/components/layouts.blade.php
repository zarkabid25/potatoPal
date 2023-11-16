<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | PotatoPal</title>

    @include('components.header')

    <style>
        .select2-container{
            width: 100% !important;
        }
    </style>

    @yield('css')
</head>
<body>

@yield('content')

@include('components.footer')

@yield('JS')
</body>
</html>
