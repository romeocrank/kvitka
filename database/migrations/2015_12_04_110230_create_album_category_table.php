<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumCategoryTable extends Migration {
 
    public function up() {
        Schema::create('album_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

 
    public function down() {
        Schema::drop('album_category');
    }
}
