<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Presale 1',
                'slug' => 'UMKMMovement-Presale-1',
                'price' => 85,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' => 'Presale 2',
                'slug' => 'UMKMMovement-Presale-2',
                'price' => 100,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' => 'Presale 3',
                'slug' => 'UMKMMovement-Presale-3',
                'price' => 115,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' => 'Ticketbox',
                'slug' => 'UMKMMovement-Ticketbox',
                'price' => 125,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        // 1st method
        // foreach ($camps as $key => $camp) {
        //     Camp::create($camp);
        // }

        // 2nd method
        Event::insert($events);
    }
}
