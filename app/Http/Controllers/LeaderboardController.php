<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameStage;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function show()
    {
        $best_games = Game::where('active', '=',0)->orderBy('gamestage_id', 'desc')
                            ->orderBy('total_time_sec')
                            ->limit(10)
                            ->get();

        return view('leaderboard', [
            'games' => $best_games,

        ]);
    }
}
