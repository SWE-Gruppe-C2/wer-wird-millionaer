<?php

namespace Database\Seeders;

use App\Models\GameStage;
use Illuminate\Database\Seeder;

class GameStageSeeder extends Seeder
{
    use CanReadCSV;

    public function run()
    {
        self::csv('data/etappen.csv', function ($entry) {
            GameStage::create([
                'price' => $entry['price'],
                'safe' => $entry['safe']
            ]);
        });
    }
}
