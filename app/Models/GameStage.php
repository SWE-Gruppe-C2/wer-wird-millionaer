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
        return GameStage::first(['id' => $this->id + 1]);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
