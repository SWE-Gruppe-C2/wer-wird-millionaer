<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $game = $user->current();

        if (!$game)
        {
            $game = Game::create([
                'stage' => 1,
                'active' => true,
                'start' => now(),
                'question_id' => Question::all()
                    ->random(1)
                    ->where('difficulty', '=', 1)
                    ->id,
                'user_id' => $user->id
            ]);
        }

        return view('game', ['question' => $game->question()]);
    }

    public function answer(Request $request)
    {
        $answer = $request->input('answer');
        $game = Auth::user()->current();

    }
}
