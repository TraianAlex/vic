<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 5)->create();
        factory(Admin::class, 1)->create();
    }
}
