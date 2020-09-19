<?php

use Illuminate\Database\Seeder;

class ProfileProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\profile_project',100)->create();
    }
}
