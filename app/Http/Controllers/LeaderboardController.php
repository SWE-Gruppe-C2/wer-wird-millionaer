<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameStage;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function show()
    {
        $best_games = Game::orderBy('gamestage_id', 'desc')
                            ->limit(10) //TODO: hier muss noch nach benötigter Zeit geordered werden
                            ->get();

        return view('leaderboard', [
            'games' => $best_games,

        ]);
    }
}
