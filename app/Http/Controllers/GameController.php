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
            'question' => $question,
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
            'question' => $question,
            'stages' => GameStage::all(),
            'chosen' => $id
        ]);
    }

    public function end()
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->current();

        $stage = GameStage::lastSafe($game->stage);

        $game->gamestage_id = $stage?->id;
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

        if (!GameStage::hasNext($game->stage))
        {
            return to_route('game.end');
        }

        $next = $game->stage->next();

        $game->gamestage_id = $next->id;
        $game->question_id = Question::random($next)->id;
        $game->save();

        return to_route('game');
    }

    public function gameover()
    {
        $user = Auth::user();

        /** @var Game $game */
        $game     = $user->last();

        return view('game-over', ['game' => $game]);
    }
}
