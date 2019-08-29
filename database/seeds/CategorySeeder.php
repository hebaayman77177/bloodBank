<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'children',
        ]);
        DB::table('categories')->insert([
            'name' => 'women',
        ]);
        DB::table('categories')->insert([
            'name' => 'public health',
        ]);
    }
}
