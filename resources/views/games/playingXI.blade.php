<button type="button" class="btn-submit">Save</button>

<h1>{{ $game->team_a }}</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>Playing XI</th>
        <th>Substitute</th>
        <th>Name</th>
        <th>Jersey No</th>
    </tr>
    </thead>
    <tbody>
    @foreach($team_a as $player)
        <tr>
            <td>
                <input type="checkbox" class="team_a_playing-xi" data-id="{{ $player->id }}"/>
            </td>
            <td>
                <input type="checkbox" class="team_a_substitute"  data-id="{{ $player->id }}"/>
            </td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->pivot->jersey_no }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
&nbsp;
<hr>
&nbsp;
<h1>{{ $game->team_b }}</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>Playing XI</th>
        <th>Substitute</th>
        <th>Name</th>
        <th>Jersey No</th>
    </tr>
    </thead>
    <tbody>
    @foreach($team_b as $player)
        <tr>
            <td>
                <input type="checkbox" class="team_b_playing-xi" data-id="{{ $player->id }}"/>
            </td>
            <td>
                <input type="checkbox" class="team_b_substitute"  data-id="{{ $player->id }}"/>
            </td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->pivot->jersey_no }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        let team_a_playing_xi = [];
        let team_b_playing_xi = [];

        $('.team_a_playing-xi').on('change', function () {
            if($(this).prop('checked') === true) {
                if(team_a_playing_xi.length > 1) {
                    alert('Team A can only play 11 players!');
                    $(this).prop('checked', false);
                    return;
                }

                team_a_playing_xi.push($(this).data('id'));
            } else {
                const index = team_a_playing_xi.indexOf($(this).data('id'));
                if (index > -1) {
                    team_a_playing_xi.splice(index, 1);
                }
            }
        })

        $('.team_b_playing-xi').on('change', function () {
            if($(this).prop('checked') === true) {
                if(team_b_playing_xi.length > 1) {
                    alert('Team B can only play 11 players!');
                    $(this).prop('checked', false);
                    return;
                }

                team_b_playing_xi.push($(this).data('id'));
            } else {
                const index = team_b_playing_xi.indexOf($(this).data('id'));
                if (index > -1) {
                    team_b_playing_xi.splice(index, 1);
                }
            }
        })
    })
</script>


