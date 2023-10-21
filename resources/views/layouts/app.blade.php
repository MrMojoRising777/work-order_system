<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Work Order System</title>
    
    <!-- CSS stylesheets and scripts -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <header>
        <!-- header content -->
        <nav>
            <ul>
                <li><a href="{{ route('workorders.index') }}">Work Orders</a></li>
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
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>