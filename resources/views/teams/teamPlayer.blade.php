<h2>Add Team Players</h2>
<button type="button" class="btn-submit">Save</button>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>in team?</th>
        <th>captain</th>
        <th>Name</th>
        <th>Role</th>
        <th>Position</th>
        <th>Nationality</th>
        <th>Age</th>
    </tr>
    </thead>
    <tbody>
    @foreach($players as $player)
        <tr>
            <td>
                <input type="checkbox" class="select-player" data-id="{{ $player->id }}" data-team-id="{{ $team->id }}" {{ $player->player_in_team == '1' ? 'checked' : '' }}/>
            </td>
            <td>
                <input type="radio" class="select-captain" name="select-captain" value="{{ $player->id }}" {{ $player->is_captain == '1' ? 'checked' : '' }}/>
            </td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->role }}</td>
            <td>{{ $player->position }}</td>
            <td>{{ $player->nationality }}</td>
            <td>{{ $player->age }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        let selectedPlayers = [];

        // Update captainPlayer dynamically when a radio button is selected
        let captainPlayer = null;  // Initialize as null, will be updated on selection

        // Capture when any captain radio button is selected
        $('input[name="select-captain"]').on('change', function () {
            captainPlayer = $(this).val();  // Update the captain player id
        });

        // Handle player selection
        $('.select-player').on('change', function(){
            if($(this).prop('checked') === true) {
                selectedPlayers.push($(this).data('id'));
            } else {
                const index = selectedPlayers.indexOf($(this).data('id'));
                if (index > -1) {
                    selectedPlayers.splice(index, 1);
                }
            }
        });

        $('input[name="select-captain"]').trigger('change');
        $('.select-player').trigger('change');

        // Handle the submit button click
        $('.btn-submit').on('click', function () {
            // Check if any player is selected
            if(selectedPlayers.length < 1) {
                alert('Please select at least one player.');
                return false;
            }

            // Check if a captain is selected
            if(!captainPlayer) {
                alert('Please select your team captain.');
                return false;
            }

            // Send the data via AJAX
            $.ajax({
                'type': 'POST',
                'url': '{{ route('admin.teams.teamPlayers.update', ['team' => $team]) }}',
                'dataType': "JSON",
                'data': {
                    '_token': '{{ csrf_token() }}',
                    'captainPlayer': captainPlayer,
                    'selectedPlayers': selectedPlayers
                },
                'success': function (res) {
                    console.log(res);
                },
                'error': function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
