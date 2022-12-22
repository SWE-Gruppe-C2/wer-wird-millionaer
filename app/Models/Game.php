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

    public function timeTaken(): string
    {

        $from = new Carbon($this->start);
        $to = new Carbon($this->end);

        return $from->diffAsCarbonInterval($to)->format('%i:%s');

    }

}
