<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceTrader</title>
</head>
<body>
<h1>Cockpit</h1>
<x-status />
<a href="/factions">Factions</a>
</body>
</html>