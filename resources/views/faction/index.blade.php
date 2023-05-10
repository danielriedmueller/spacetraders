<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceTrader</title>
</head>
<body>
<h1>Factions</h1>
<a href="/dashboard">Dashboard</a>
<div>
    <ul>
        @foreach($factions as $faction)
            <li>
                <ul>
                    <li>Name: {{ $faction->name }}</li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
