<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Form</title>
</head>
<body>

<a href="{{ route('admin.games.index') }}">
    List Games
</a>

<h2>Game Create Form</h2>

<form action="{{ route('admin.tournament.store') }}" method="POST">
    @csrf

    <label for="name">Game Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="name">Game Date & Time:</label>
    <input type="datetime-local" id="date_time" name="date_time" required><br><br>

    <label for="venue">Game Venue:</label>
    <input type="text" id="venue" name="venue" required><br><br>

    <label for="no_of_teams">No of Teams:</label>
    <input type="integer" id="no_of_teams" name="no_of_teams" required><br><br>

    <label for="remarks">Remarks:</label>
    <input type="text" id="remarks" name="remarks" required><br><br>

    <!-- Submit Button -->
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>

</body>
</html>
