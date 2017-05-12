<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTagTable extends Migration {
    
    public function up()
    {
        Schema::create('image_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id');
            $table->integer('tag_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('image_tag');
    }
}
