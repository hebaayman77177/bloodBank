<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'header' => 'children health care',
            'content' => 'test content',
            'img_path' => '.'
        ]);
        DB::table('articles')->insert([
            'header' => 'women health care',
            'content' => 'test content',
            'img_path' => '.'
        ]);
    }
}
