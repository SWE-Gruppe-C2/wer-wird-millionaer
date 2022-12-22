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
                            ->orderBy(Game::getModel()->timeTaken()) //TODO: Weiß nicht ob der Methoden Aufruf funktioniert
                            ->limit(10)
                            ->get();

        return view('leaderboard', [
            'games' => $best_games,

        ]);
    }
}
