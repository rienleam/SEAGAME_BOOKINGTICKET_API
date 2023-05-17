<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events =[
            ["name" => "First Football competition", "description" => "amazing", "date" => "2023-05-05", "stadia_id" => 1, "sport_id" => 1],
            ["name" => "Second Football competition", "description" => "please join", "date" => "2023-08-09", "stadia_id" => 2, "sport_id" => 2],
            ["name" => "Finall Football competition", "description" => "have a nice day", "date" => "2023-09-07", "stadia_id" => 3, "sport_id" => 3],
        ];
        foreach($events as $event) {
            Event::create($event);
        }
    }
}
