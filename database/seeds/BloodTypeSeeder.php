<?php

use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->insert([
            'name' => 'AB',
        ]);
        DB::table('blood_types')->insert([
            'name' => 'O',
        ]);
        DB::table('blood_types')->insert([
            'name' => 'A+',
        ]);
    }
}
