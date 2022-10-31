<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventDetail;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events_details = [
            [

                'event_id' => 1,
                'ticket_name' => 'Presale 1',
                'price' => 85000,
            ],

            [
                'event_id' => 1,
                'ticket_name' => 'Presale 2',
                'price' => 100000,
            ],
            [
                'event_id' => 1,
                'ticket_name' => 'Presale 3',
                'price' => 115000,
            ],
            [
                'event_id' => 1,
                'ticket_name' => 'Ticketbox',
                'price' => 125000,
            ],
        ];
        EventDetail::insert($events_details);
    }
}
