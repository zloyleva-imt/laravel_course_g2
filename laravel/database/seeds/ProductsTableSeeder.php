<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = \DB::table('categories')->get()->pluck('id')->toArray();

        for($i=0;$i<100;$i++){
            \DB::table('products')->insert([
                'name'=>$faker->sentence(),
                'description'=>$faker->paragraph(),
                'price'=>$faker->randomFloat(2,1,3000),
                'amount'=>$faker->numberBetween(0,3000),
                'category_id'=>$faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
