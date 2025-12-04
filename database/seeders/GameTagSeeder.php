<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GameTag::create(['tag'=>'Ironman']);
        GameTag::create(['tag'=>'MP']);
        GameTag::create(['tag'=>'Mods']);
        GameTag::create(['tag'=>'Singleplayer']);
        GameTag::factory(10)->create();
    }
}
