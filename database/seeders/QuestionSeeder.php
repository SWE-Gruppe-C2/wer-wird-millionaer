<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    use CanReadCSV;

    public function run()
    {
        self::csv_semicolon('data/fragenkatalog.csv', function ($entry) {
            Question::create([
                'text' => $entry['text'],
                'correct_answer' => $entry['correct_answer'],
                'answers' => [
                    $entry['answer_a'],
                    $entry['answer_b'],
                    $entry['answer_c'],
                    $entry['answer_d']
                ],
                'difficulty' => $entry['difficulty'],
                'category_id' => Category::firstOrCreate(['name' => $entry['category']])
                    ->id
            ]);
        });
    }
}
