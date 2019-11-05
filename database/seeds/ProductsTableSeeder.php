<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCount = max((int)$this->command->ask('How many products would you like?', 10), 1);
        factory(App\Product::class, $productsCount)->create();
    }
}
