// resources/views/layouts/app.blade.php

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Todos</title>

        <!-- CSS And JavaScript -->
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>

        <!-- special blade directive the specifies where child views should inject content -->
        @yield('content')
    </body>
</html>