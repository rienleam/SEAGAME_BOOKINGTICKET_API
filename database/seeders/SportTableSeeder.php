<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports =[
            ["name" => "Football"],
            ["name" => "Basketball"],
            ["name" => "Volleyball"],
            ["name" => "Badminton"],
            ["name" => "Golf"],
            ["name" => "Tennis"],
            ["name" => "Kun Khmer"],
            ["name" => "Petanque"],
            ["name" => "Taekwondo"],
            ["name" => "Finswimming"],
        ];
        foreach($sports as $sport) {
            Sport::create($sport);
        }
    }
}
