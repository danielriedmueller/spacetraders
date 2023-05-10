@php /** @var \App\Models\Waypoint $waypoint */ @endphp
<div>
    <a href="{{ url('waypoint', $waypoint->symbol) }}">{{ $waypoint->symbol }}</a>
    <div>
        <img src="{{ asset($waypoint->image) }}">
    </div>
    <div>@include('view.traits', ['traits' => $waypoint->traits])</div>
</div>
