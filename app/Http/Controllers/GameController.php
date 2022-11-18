<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public static function index()
    {
        return([
            'games' => DB::table('games')
                ->join('users', 'users.id', '=', 'games.user_id')
                ->select('users.name', 'games.gewinnsumme', 'games.zeit')
                ->orderBy('gewinnsumme', 'desc')
                ->orderBy('zeit', 'asc')
                ->limit(10)
                ->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $gewinnsumme = $request->input('gewinnsumme');
        $zeit = $request->input('zeit');
        $user_id = $request->session()->get('user_id');

        DB::table('games')->insert([
            'user_id' => $user_id,
            'gewinnsumme' => $gewinnsumme,
            'zeit' => $zeit,
        ]);

        return redirect(route('game-end'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
