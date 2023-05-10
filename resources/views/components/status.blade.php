@php /** @var \App\Models\MyAgent $myAgent */ @endphp
<div>
    <h2>{{ $myAgent->getSymbol() }}</h2>
    <div>Credits: {{ $myAgent->getCredits() }}</div>
    <div>
        Headquarters: <a href="{{ url('waypoint', $myAgent->getHeadquarters()->getSymbol()) }}">{{ $myAgent->getHeadquarters()->getSymbol() }}</a>
        <img src="{{ asset($myAgent->getHeadquarters()->getImagePath()) }}" alt="" title="">
    </div>
</div>
