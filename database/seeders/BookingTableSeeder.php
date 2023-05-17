<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings =[
            ["price" => 20, "zone" => "B", "event_id" => 1],
            ["price" => 30, "zone" => "A", "event_id" => 2],
            ["price" => 30, "zone" => "A", "event_id" => 3],
        ];
        foreach($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
