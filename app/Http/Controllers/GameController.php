<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Staff;
use App\Models\Team;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('games.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::get();
        $staffs = Staff::where('role', '1')->get();

        return view('games.create', compact('teams', 'staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        Game::create([
            'date_time' => $request->date_time,
            'venue' => $request->venue,
            'weather' => $request->weather,
            'team_a_id' => $request->team_a_id,
            'team_b_id' => $request->team_b_id,
            'referee' => $request->referee,
            'first_linesmen' => $request->first_linesmen,
            'second_linesmen' => $request->second_linesmen,
            'official' => $request->official,
        ]);

        return redirect()->route('admin.games.index')->with('success', 'New Game Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
