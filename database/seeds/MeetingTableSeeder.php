<?php

use Illuminate\Database\Seeder;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\Models\Meeting', 150)->create() ;
    }
}
