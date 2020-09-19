<?php

use App\User;
use App\user_role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $role_id = 2;
        $count= 1;

        foreach($user_ids as $id){
            if($count ==1) {
                $role_id = 1;
            }else{
                $role_id = 2;
            }
            $user_role =new user_role();
            $user_role->user_id =$id;
            $user_role->role_id =$role_id ;
            $user_role->save();
            $count++;

        }
    }
}
