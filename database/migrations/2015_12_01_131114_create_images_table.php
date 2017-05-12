<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration  {
    
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('weight');
            $table->string('original_file_name');
            $table->string('file_name');
            $table->string('path');
            $table->integer('album_id')->unsigned();
            // $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
            $table->integer('width');
            $table->integer('height');
            $table->integer('confirmed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('images');
    }
}
