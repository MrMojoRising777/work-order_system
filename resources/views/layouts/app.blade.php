<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Work Order System</title>
    
    <!-- CSS stylesheets and scripts -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">
</head>
<body>
    <header>
        <!-- header content -->
        <nav>
            <ul>
                <li><a href="{{ route('workorders.index') }}">All Orders</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- content of specific view -->
        @yield('content')
    </main>

    <footer>
        <!-- footer content -->
    </footer>

    <!-- JavaScript scripts -->
    <!-- <script src="{{ asset('assets/js/script.js') }}"></script> -->

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
</body>
</html>