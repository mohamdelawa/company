<?php
use App\profile;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::all()->pluck('id')->toArray();
        foreach($user_ids as $id){
            $profile =new profile();
            $profile->name =$faker->name;
            $profile->dob =$faker->date() ;
            $profile->user_id =$id;
            $profile->career =$faker->jobTitle;
            $profile->phone =$faker->phoneNumber;
            $profile->address = $faker->address;
            $profile->gender =$faker->randomElement(['mail', 'femail']);
            $profile->save();

        }
    }
}
