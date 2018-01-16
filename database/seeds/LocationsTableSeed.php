<?php

use Illuminate\Database\Seeder;

class LocationsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Location::create([
            'name' => 'Bucharest',
            'address' => 'Vulturilor 98',

        ]);
    }
}
