@php /** @var \App\Models\Agent $agent */ @endphp
<div>
    <h2>{{ $agent->symbol }}</h2>
    <div>Credits: {{ $agent->credits }}</div>
    <x-waypoint symbol="{{ $agent->headquarters }}" />
</div>
