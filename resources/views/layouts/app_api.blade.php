<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		@yield('script')
    </head>
    <body>
        @section('sidebar')
        @show
 
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>