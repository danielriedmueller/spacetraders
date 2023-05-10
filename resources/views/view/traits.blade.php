<ul>

    @php /** @var \App\Models\WaypointTrait[] $traits */ @endphp
    @foreach($traits as $trait)
        <li>
            <ul>
                <li>{{ $trait->name }}</li>
                <li>{{ $trait->description }}</li>
            </ul>
        </li>
    @endforeach
</ul>
