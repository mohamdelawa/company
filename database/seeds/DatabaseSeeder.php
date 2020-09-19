<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ProfileProjectSeeder::class);
        $this->call(ImageProjectSeeder::class);
        $this->call(ContactSeeder::class);


    }
}
