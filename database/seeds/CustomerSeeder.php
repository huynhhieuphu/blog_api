<?php

use Illuminate\Database\Seeder;
use App\Customer; //model Customer

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 70)->create();
    }
}
