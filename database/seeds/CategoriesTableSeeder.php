<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Run database inserts
    	DB::table('categories')->insert([
    		['name' => 'Uncategorized', 'color' => '004b0c'],
    		['name' => 'Personal', 'color' => '015caf'],
    		['name' => 'Family', 'color' => '8a0032'],
    		['name' => 'Study', 'color' => '8a3d00'],
    		['name' => 'Work', 'color' => '42008a'],
    	]);
    }
}
