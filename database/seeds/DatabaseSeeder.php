<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    
    public function run() {

        // DB::table('albums')->insert([
        //     'title' => 'Первый альбом',
        //     'description' => 'первое описание',
        // ]);

        // DB::table('albums')->insert([
        //     'title' => 'Второй альбом',
        //     'description' => 'второе описание',
        // ]);

        // DB::table('albums')->insert([
        //     'title' => 'Третий альбом',
        //     'description' => 'третье описание',
        // ]);

        // DB::table('albums')->insert([
        //     'title' => 'Четвёртый альбом',
        //     'description' => 'четвертое описание',
        // ]);

        // DB::table('albums')->insert([
        //     'title' => 'Пятый альбом',
        //     'description' => 'пятое описание',
        // ]);



        DB::table('categories')->insert([
            'title' => 'all',
            'description' => 'Стараюсь для вас',
        ]);

        DB::table('categories')->insert([
            'title' => 'commercial',
            'description' => 'Стараюсь для вас',
        ]);

        DB::table('categories')->insert([
            'title' => 'for myself',
            'description' => 'Стараюсь для вас',
        ]);

        DB::table('images')->insert([
            'path'=>'/images/no-photo.gif',
            'file_name'=>'no-photo.gif',
            'original_file_name'=>'no-photo.gif',
            'description' => 'нет фотографий',
            'title' => 'нет фотографии',
        ]);
    }
}    