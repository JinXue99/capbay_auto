<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>CapBay Vroom</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">CapBay Vroom</h1>
        @yield('content')
    </div>
</body>

</html>
