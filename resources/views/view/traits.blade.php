<ul>
    @php /** @var \App\Models\STrait[] $traits */ @endphp
    @foreach($traits as $trait)
        <li>
            <ul>
                <li>{{ $trait->getName() }}</li>
                <li>{{ $trait->getDescription() }}</li>
            </ul>
        </li>
    @endforeach
</ul>
