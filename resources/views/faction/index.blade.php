<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaceTrader</title>
</head>
<body>
<h1>Factions</h1>
<a href="/">Dashboard</a>
<div>
    <ul>
        @php /** @var \App\Models\Faction[] $factions */ @endphp
        @foreach($factions as $faction)
            <li>
                <ul>
                    <li>{{ $faction->getName() }}</li>
                    <li>{{ $faction->getDescription() }}</li>
                    <li>{{ $faction->getHeadquarters() }}</li>
                    <li>
                        <ul>
                            @php /** @var \App\Models\FactionTrait[] $traits */ @endphp
                            @foreach($faction->getTraits() as $trait)
                                <li>
                                    <ul>
                                        <li>{{ $trait->getName() }}</li>
                                        <li>{{ $trait->getDescription() }}</li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
