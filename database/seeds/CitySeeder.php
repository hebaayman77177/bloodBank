<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'agoza',
            'governorate_id'=>'1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Doki',
            'governorate_id'=>'1'
        ]);
        DB::table('cities')->insert([
            'name' => 'mokatem',
            'governorate_id'=>'2'
        ]);
    }
}
