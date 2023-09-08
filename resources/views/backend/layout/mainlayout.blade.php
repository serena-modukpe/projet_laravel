<!DOCTYPE html>

<html lang="en">

 <head>

   @include('backend.layout.partials.head')
 

 </head>

 <body>
    @include('backend.layout.partials.header')

    @include('backend.layout.partials.sidebar')
    
    <style>
    table {
        border-collapse: collapse; /* Fusionne les bordures de la table */
        width: 100%;
    }

    th,
    td {
        padding: 8px; /* Ajuste l'espacement interne des cellules */
        text-align: center;
        
    }

   

</style>

<main id="main" class="main">

    @yield('content')
</main>

    @include('backend.layout.partials.footer')

    @include('backend.layout.partials.footer-scripts')

 </body>
 @if(session('success') && request()->routeIs('dashboard'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Connexion réussie',
            text: '{{ session('success') }}',
        });
    </script>
@endif



</html>