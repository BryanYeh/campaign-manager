<?php

use Illuminate\Database\Seeder;
use App\Supervisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SupervisorKeys extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supervisors = Supervisor::all();

        foreach ($supervisors as $supervisor) {

            DB::table('supervisor_keys')->insert([
                'supervisor_id' => $supervisor->id,
                'key' => str_random(15)
            ]);
        }

    }
}
