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
                    <li><img src="{{ asset($faction->image) }}"></li>
                    <li>{{ $faction->name }}</li>
                    <li>{{ $faction->description }}</li>
                    <li><x-waypoint symbol="{{ $faction->headquarters }}" /></li>
                    <li>@include('view.traits', ['traits' => $faction->traits])</li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
