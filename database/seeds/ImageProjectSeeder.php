<?php

use Illuminate\Database\Seeder;

class ImageProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\image_project',40)->create();
    }
}
