<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'heba ayman',
            'password'=>'123456789',
            'phone'=>'0123456789',
            'email' => 'llll@h.h',
            'date_of_birth'=>'2019-08-23',
            'date_of_last_donation' => '2019-08-23',
            'city_id'=>1,
            'blood_type_id'=>1,
            'api_token'=>'99cPaQ8SR5UsTQtLDYrCsIAv1eheaF9WriG2mzRc4C4ui9n8M22rnWqkFQYu'
        ]);
    }
}
