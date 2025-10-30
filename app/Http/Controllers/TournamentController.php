<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{

    public function listTournament(Request $request)
    {
        $tournaments = Tournament::all();

        return view('tournaments.list', compact('tournaments'));
    }
    public function createTournament(Request $request)
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        $date = new \DateTime();

        Tournament::create([
            'name' => $request->name,
            'year' => $date->format('Y'),
            'date' => $date->format('Y-m-d H:i:s'),
            'venue' => $request->venue,
            'no_of_teams' => $request->no_of_teams,
            'tournamentType' => '1',
            'status' => '0',
            'remarks' => $request->remarks
        ]);

        return redirect()->route('admin.tournament.index')->with('success', 'New Game Created.');
    }

    public function update(Request $request)
    {
        dd('here');
    }
}
