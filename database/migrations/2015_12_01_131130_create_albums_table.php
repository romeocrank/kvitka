<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {
    
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('url');
            $table->integer('type');
            $table->integer('cover');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('albums');
    }
}
