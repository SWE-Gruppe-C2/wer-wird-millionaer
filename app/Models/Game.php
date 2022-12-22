<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'start',
        'end',
        'user_id',
        'question_id',
        'gamestage_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function stage()
    {
        return $this->belongsTo(GameStage::class, 'gamestage_id');
    }

    public function timeTaken(): int
    {
        foreach (self::all() as $game) { // Temporärer fix, damit kein Fehler geworfen wird.
        //TODO: Die benötigte Zeit ist noch nicht richtig formatiert / nicht null sicher
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $game->start);
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $game->end);

        return $from->DiffInMinutes($to);
        }
    }

}
