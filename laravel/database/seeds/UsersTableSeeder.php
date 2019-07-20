<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<100;$i++){
            \DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'password'=>bcrypt('123456789'),
                'role'=>'admin',
            ]);
        }

    }
}
