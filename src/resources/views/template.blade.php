<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Nuntius') }}</title>

    <meta name="author" content="Rogier Knoester">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ asset('vendor/nuntius/css/app.css') }}">

</head>

<body>

<div id="nuntius-app">
    @yield('content')
</div>
<script>
    window.csrf = '{{ csrf_token() }}';
    window.nuntius_root_url = '{{ $nuntius_root_url }}';
</script>
<script src="{{ asset('vendor/nuntius/js/app.js') }}"></script>
</body>
</html>