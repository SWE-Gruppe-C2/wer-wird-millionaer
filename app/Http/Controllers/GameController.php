<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameStage;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->current();

        /** @var Question $question */
        $question = $game->question;

        return view('game', [
            'game' => $game,
            'stages' => GameStage::all()
        ]);
    }

    public function result(int $id)
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->current();

        /** @var Question $question */
        $question = $game->question;

        return view('game-result', [
            'game' => $game,
            'stages' => GameStage::all()
        ]);
    }

    public function end()
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->current();

        /** @var Question $question */
        $question = $game->question;

        $game->active = false;
        $game->end = now();
        $game->save();

        return to_route('game.over');
    }

    public function answer(int $id)
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->current();

        /** @var Question $question */
        $question = $game->question;

        if ($id != $question->correct_answer)
        {
            return to_route('game.end');
        }

        if ($game->stage == 15)
        {
            return to_route('game.end');
        }

        $game->stage += 1;
        $game->question_id = Question::random($game->stage)->id;
        $game->save();

        return to_route('game');
    }

    public function gameover()
    {
        return view('game-over');
    }
}
