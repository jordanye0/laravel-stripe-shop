<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How many users would you like?', 10), 1);
        factory(App\User::class)->states('admin')->create();
        factory(App\User::class, $usersCount)->create();
    }
}
