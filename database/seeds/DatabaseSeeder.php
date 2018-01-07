<?php

use App\Link;
use App\User;
use App\Admin;
use App\Category;
use Illuminate\Database\Seeder;

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
        User::truncate();
        Admin::truncate();
        factory(User::class, 2)->create();
        factory(Admin::class, 1)->create();
        //factory(Link::class, 10)->create();
        //factory(Category::class, 2)->create();
    }
}
