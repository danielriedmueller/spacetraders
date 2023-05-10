@php /** @var \App\Models\Waypoint $waypoint */ @endphp
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
<h1>Waypoint {{ $waypoint->getSymbol() }}</h1>
<img src="{{ asset($waypoint->getImagePath()) }}" alt="" title="">
@include('view.traits', ['traits' => $waypoint->getTraits()])
<ul>
    @foreach($waypoint->getOrbitals() as $orbital)
        <li>
            <ul>
                <li><a href="{{ url('waypoint', $orbital->getSymbol()) }}">{{ $orbital->getSymbol() }}</a></li>
                <li><img src="{{ asset($orbital->getImagePath()) }}" alt="" title=""></li>
                <li>@include('view.traits', ['traits' => $orbital->getTraits()])</li>
            </ul>
        </li>
    @endforeach
</ul>
</body>
</html>
