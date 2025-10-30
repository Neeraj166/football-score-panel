<h2>Tournament Information</h2>

<a href="{{ route('admin.tournament.create') }}">
    Create new tournament
</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tournaments as $tournament)
        <tr>
            <td>{{ $tournament->name }}</td>
            <td>
                @if($tournament->status == '0')
                    <span>Not yet started</span>
                @elseif($tournament->status == '1')
                    <span>Match Ongoing</span>
                @elseif($tournament->status == '2')
                    <span>Match Completed</span>
                @elseif($tournament->status == '3')
                    <span>Match Cancelled</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.tournament.edit', ['tournament' => $tournament]) }}">Update</a> |
                <a href="{{ route('admin.tournament.edit', ['tournament' => $tournament]) }}">List Games</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
