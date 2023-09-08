<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>
    @include('layouts.partials.header')

    @yield('content')

    @include('sweetalert::alert')

    @include('layouts.partials.footer')

    @include('layouts.partials.footer-scripts')

 </body>

</html>