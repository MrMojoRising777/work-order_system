<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Work Order System</title>
    
    <!-- CSS stylesheets and scripts -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <header>
        <!-- header content -->
        <nav>
            <ul>
                <li><a href="{{ route('workorders.index') }}">All Orders</a></li>
                <li><a href="{{ route('workorders.filter', ['status' => 'open']) }}">Open Orders</a></li>
                <li><a href="{{ route('workorders.filter', ['status' => 'closed']) }}">Closed Orders</a></li>
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