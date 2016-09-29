<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach( range(1,10) as $i){
            Product::create([
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat(),
                'featured' => $faker->boolean(),
                'recommend' => $faker->boolean(),
            ]);
        }

    }
}
