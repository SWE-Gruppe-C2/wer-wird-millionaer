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
                            ->orderBy('time_needed_sec')
                            ->limit(10) //TODO: Zeitsortierung funktioniert noch nicht
                            ->get();

        return view('leaderboard', [
            'games' => $best_games,

        ]);
    }
}
