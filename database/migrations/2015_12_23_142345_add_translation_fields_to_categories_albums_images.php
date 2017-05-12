<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslationFieldsToCategoriesAlbumsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //categories
        if (!Schema::hasColumn('categories', 'title_ru')) {
            Schema::table('categories', function ($table) {
                $table->string('title_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('categories', 'title_ua')) {
            Schema::table('categories', function ($table) {
                $table->string('title_ua')->after('description');
            });
        }

        if (!Schema::hasColumn('categories', 'description_ru')) {
            Schema::table('categories', function ($table) {
                $table->string('description_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('categories', 'description_ua')) {
            Schema::table('categories', function ($table) {
                $table->string('description_ua')->after('description');
            });
        }

        //albums
        if (!Schema::hasColumn('albums', 'title_ru')) {
            Schema::table('albums', function ($table) {
                $table->string('title_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('albums', 'title_ua')) {
            Schema::table('albums', function ($table) {
                $table->string('title_ua')->after('description');
            });
        }

        if (!Schema::hasColumn('albums', 'description_ru')) {
            Schema::table('albums', function ($table) {
                $table->string('description_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('albums', 'description_ua')) {
            Schema::table('albums', function ($table) {
                $table->string('description_ua')->after('description');
            });
        }

        //images
        if (!Schema::hasColumn('images', 'title_ru')) {
            Schema::table('images', function ($table) {
                $table->string('title_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('images', 'title_ua')) {
            Schema::table('images', function ($table) {
                $table->string('title_ua')->after('description');
            });
        }

        if (!Schema::hasColumn('images', 'description_ru')) {
            Schema::table('images', function ($table) {
                $table->string('description_ru')->after('description');
            });
        }
        if (!Schema::hasColumn('images', 'description_ua')) {
            Schema::table('images', function ($table) {
                $table->string('description_ua')->after('description');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //categories
        if (Schema::hasColumn('categories', 'title_ru')) {
            Schema::table('categories', function ($table) {
                $table->dropColumn('title_ru');
            });
        }
        if (Schema::hasColumn('categories', 'title_ua')) {
            Schema::table('categories', function ($table) {
                $table->dropColumn('title_ua');
            });
        }

        if (Schema::hasColumn('categories', 'description_ru')) {
            Schema::table('categories', function ($table) {
                $table->dropColumn('description_ru');
            });
        }
        if (Schema::hasColumn('categories', 'description_ua')) {
            Schema::table('categories', function ($table) {
                $table->dropColumn('description_ua');
            });
        }

        //albums
        if (Schema::hasColumn('albums', 'title_ru')) {
            Schema::table('albums', function ($table) {
                $table->dropColumn('title_ru');
            });
        }
        if (Schema::hasColumn('albums', 'title_ua')) {
            Schema::table('albums', function ($table) {
                $table->dropColumn('title_ua');
            });
        }

        if (Schema::hasColumn('albums', 'description_ru')) {
            Schema::table('albums', function ($table) {
                $table->dropColumn('description_ru');
            });
        }
        if (Schema::hasColumn('albums', 'description_ua')) {
            Schema::table('albums', function ($table) {
                $table->dropColumn('description_ua');
            });
        }

        //images
        if (Schema::hasColumn('images', 'title_ru')) {
            Schema::table('images', function ($table) {
                $table->dropColumn('title_ru');
            });
        }
        if (Schema::hasColumn('images', 'title_ua')) {
            Schema::table('images', function ($table) {
                $table->dropColumn('title_ua');
            });
        }

        if (Schema::hasColumn('images', 'description_ru')) {
            Schema::table('images', function ($table) {
                $table->dropColumn('description_ru');
            });
        }
        if (Schema::hasColumn('images', 'description_ua')) {
            Schema::table('images', function ($table) {
                $table->dropColumn('description_ua');
            });
        }
    }
}
