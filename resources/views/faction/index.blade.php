<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceTrader</title>
</head>
<body>
<h1>Factions</h1>
<x-status />
<a href="/">Dashboard</a>
<div>
    <ul>
        @php /** @var \App\Models\Faction[] $factions */ @endphp
        @foreach($factions as $faction)
            <li>
                <ul>
                    <li><img src="{{ asset($faction->getImagePath()) }}" alt="" title=""></li>
                    <li>{{ $faction->getName() }}</li>
                    <li>{{ $faction->getDescription() }}</li>
                    <li>
                        Headquarters: <a href="{{ url('waypoint', $faction->getHeadquarters()->getSymbol()) }}">{{ $faction->getHeadquarters()->getSymbol() }}</a>
                        <img src="{{ asset($faction->getHeadquarters()->getImagePath()) }}" alt="" title="">
                    </li>
                    <li>@include('view.traits', ['traits' => $orbital->getTraits()])</li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
