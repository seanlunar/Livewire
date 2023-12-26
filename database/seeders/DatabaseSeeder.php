<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Product::factory(100)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $continents =[
        //     ['id' =>1, 'name'=> 'Europe',],
        //     ['id' =>2, 'name'=> 'Asia',],
        //     ['id' =>3, 'name'=> 'Africa',],
        //     ['id' =>4, 'name'=> 'South Americar',],
        //     ['id' =>5, 'name'=> 'North America',],

        // ];
        // foreach($continents as $continent){
        //     Continent::factory()->create($continent)
        //     ->each(function ($c){
        //     $c->countries()->saveMany(Country::factory(10)->make());
        //     });
        //     ;
        // }
    }
}
