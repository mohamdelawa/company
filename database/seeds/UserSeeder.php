<?php
use Illuminate\Database\Seeder;
use App\user;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new user();
        $user->email = 'admin@admin.com';
        $user->password =Hash::make('adminadmin');
        $user->save();

        $user = new user();
        $user->email = 'user@user.com';
        $user->password =Hash::make('useruser');
        $user->save();
        factory('App\User',20)->create();
    }
}
