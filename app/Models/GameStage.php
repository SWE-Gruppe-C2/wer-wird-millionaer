<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'safe'
    ];

    public function next()
    {
        return GameStage::where('id', '=', $this->id + 1)->first();
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'gamestage_id');
    }

    public static function hasNext(GameStage $stage)
    {
        return $stage->id != 15;
    }

    public static function lastSafe(GameStage $stage)
    {
        return GameStage::where('safe', '=', true)
            ->where('id', '<=', $stage->id)
            ->orderByDesc('id')
            ->first();
    }
}
