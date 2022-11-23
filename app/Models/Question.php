<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'antwort_a',
        'antwort_b',
        'antwort_c',
        'antwort_d',
        'richtige_antwort',
        'schwierigkeit',
        'category',
];
}
