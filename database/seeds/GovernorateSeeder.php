<?php

use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governorates')->insert([
            'name' => 'Giza',
        ]);
        DB::table('governorates')->insert([
            'name' => 'cairo',
        ]);
    }
}
