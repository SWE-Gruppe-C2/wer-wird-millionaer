<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'answers',
        'correct_answer',
        'difficulty',
        'category_id',
    ];

    /**
     * De -/Serialisiert das Attribut '$answers'.
     *
     * ```php
     * $question = Question::find(1);
     *
     * var_dump($question->answers); // ['Antwort 1', 'Antwort 2', 'Antwort 3', 'Antwort 4']
     *
     * $question->answers = ['Antwort 1', 'Antwort 2', 'Antwort 3', 'Antwort 4']
     * ```
     *
     * @return Attribute
     */
    public function answers(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(';', $value),
            set: fn ($value) => implode(';', $value)
        );
    }

    public static function random(int $difficulty)
    {
        return self::all()
            ->where('difficulty', '=', $difficulty)
            ->random(1)
            ->first();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
