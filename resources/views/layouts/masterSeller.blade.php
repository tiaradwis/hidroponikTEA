<!doctype html>

<head> 

@include('layouts.partials.head')

</head>

<body>
    @include('layouts.partials.navbarSeller')

    @yield('content')

    @include('layouts.partials.scripts')  
</body>

</html>