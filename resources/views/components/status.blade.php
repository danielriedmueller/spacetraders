@php /** @var \App\Models\MyAgent $myAgent */ @endphp
<div>
    <h2>{{ $myAgent->getSymbol() }}</h2>
    <div>Credits: {{ $myAgent->getCredits() }}</div>
    <div>
        Headquarters: {{ $myAgent->getHeadquarters()->getSymbol() }}
        <img src="{{ asset($myAgent->getHeadquarters()->getImagePath()) }}" alt="" title="">
    </div>
</div>
