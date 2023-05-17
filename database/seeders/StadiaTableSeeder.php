<?php

namespace Database\Seeders;

use App\Models\Stadia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StadiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stadias =[
            ["address" => "Morodok Techo National Stadium", "zone_a" => 5000, "zone_b" => 10000],
            ["address" => "Olympic National Stadium", "zone_a" => 3000, "zone_b" => 8000],
            ["address" => "Royal University of Phnom Penh", "zone_a" => 100, "zone_b" => 500],
        ];
        foreach($stadias as $stadia) {
            Stadia::create($stadia);
        }
    }
}
