<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Ordis;

class OrdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
                [
                    'nom' => 'PC1',
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [
                    'nom' => 'PC2',
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [
                    'nom' => 'PC3',
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ]
            ];

        Ordis::insert($array);
    }
}
