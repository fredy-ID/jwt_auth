<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Attribution;

class AttributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'clients_id' => 1,
                'ordis_id' => 1,
                'date' => Carbon::now()->addDay(),
                'horaire' => '9',//date('H',strtotime("+1 hour", strtotime(date('H')))),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'clients_id' => 1,
                'ordis_id' => 2,
                'date' => Carbon::now(),
                'horaire' => '10',
                'created_at'=> Carbon::now()->addDays(1),
                'updated_at'=> Carbon::now()
            ],
            [
                'clients_id' => 2,
                'ordis_id' => 3,
                'date' => Carbon::now()->addDays(2),
                'horaire' => '13',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'clients_id' => 2,
                'ordis_id' => 2,
                'date' => Carbon::now()->addDays(2),
                'horaire' => '13',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'clients_id' => 3,
                'ordis_id' => 3,
                'date' => Carbon::now()->addDays(2),
                'horaire' => '14',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ];

        Attribution::insert($array);
    }
}
