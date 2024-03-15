<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use faker\Factory as faker;

class customersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for($i=0;$i<50;$i++){
        $customer = new Customer();
        $customer->name = $faker->name;
        $customer->email = $faker->email;
        $customer->password = $faker->password;
        $customer->point = 0;
        $customer->gender = "male";
        $customer->save();}
    }
}
