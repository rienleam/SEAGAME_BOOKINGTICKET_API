<?php

namespace Database\Seeders;

use App\Models\Matching;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matchings =[
            ["team1" => "Cambodia", "team2" => "Vietnam", "time" => "16:00:00", "description" => "please joint", "event_id" => 1],
            ["team1" => "Thailand", "team2" => "Indonesia", "time" => "19:00:00", "description" => "please joint", "event_id" => 2],
            ["team1" => "Cambodia", "team2" => "Thailand", "time" => "16:00:00", "description" => "please joint", "event_id" => 3],
        ];
        foreach($matchings as $match) {
            Matching::create($match);
        }
    }
}
