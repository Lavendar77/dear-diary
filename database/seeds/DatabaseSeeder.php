<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // Create 10 random users
        factory(App\User::class, 5)->create();

        // Create category list
        $this->call(CategoriesTableSeeder::class);
    }
}
