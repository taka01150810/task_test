<?php

use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('routes')->insert([
            [
                'id' => 1,
                'name' => '山手線',
                'sort_no' => 1
            ],
            [
                'id' => 2,
                'name' => '横浜線',
                'sort_no' => 2
            ],
            [
                'id' => 3,
                'name' => '相模原線',
                'sort_no' => 3
            ],
        ]);
    }
}
