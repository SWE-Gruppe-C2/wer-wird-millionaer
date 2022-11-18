<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public static function select(string $string, string $string1, string $string2)
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'gewinnsumme',
        'zeit',
    ];
}
