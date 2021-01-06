<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <livewire:scripts />
</head>
<body>
    @yield('body')
</body>
</html>