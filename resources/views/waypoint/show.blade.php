<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceTrader</title>
</head>
<body>
<x-status />
<a href="/">Cockpit</a>
<a href="/factions">Factions</a>
<h1>Waypoint {{ $symbol }}</h1>
<x-waypoint symbol="{{ $symbol }}" />
</body>
</html>
