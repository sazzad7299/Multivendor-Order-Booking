<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

     <!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    {{-- sweet alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css" />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">

    {{-- <link href="{{ mix('css/fontawesome.css', 'themes/admin') }}" rel="stylesheet"> --}}
    <link href="{{ mix('css/custom.css', 'themes/admin') }}" rel="stylesheet">
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
    <div id="root">
        @include('layouts.sidebar')
        <div class="relative md:ml-64 bg-blueGray-50">
            @include('layouts.topbar')
    
            @yield('content')
    
        </div> 

    </div>
     <!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    {{-- Sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.all.min.js" ></script>


    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <!--custom js -->
    <script src="{{ mix('js/custom.js', 'themes/admin') }}" defer></script>

    <script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script> 
    @if(Session::has('success')) 
    <script>
        Swal.fire({
            position: 'top-end',
            toast:true,
            icon: 'success',
            title: "{!! Session('success') !!}",
            showConfirmButton: false,
            timer: 1500
            })
    </script>
    @endif
    @if(Session::has('error')) 
    <script>
        Swal.fire({
            position: 'top-end',
            toast:true,
            icon: 'error',
            title: "{!! Session('error') !!}",
            showConfirmButton: false,
            timer: 1500
            })
    </script>
    @endif
</body>
</html>
