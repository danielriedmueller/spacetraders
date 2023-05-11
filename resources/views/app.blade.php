<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite('resources/sass/app.scss')
    <title>Space Trader</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <div id="app"></div>
</div>
@vite('resources/js/app.js')
</body>
</html>
