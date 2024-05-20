<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnContentToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn("content","post_content");
            // Սխալը ուղղելու համար հնում ենք https://www.doctrine-project.org/projects/dbal.html
            // այս հասցեն և վերցնում այս հրահանգը composer require doctrine/dbal
            // php artisan migrate
            // ՏԵսակը փոխելու համար ևս մի migration 
            // php artisan make:migration change_column_post_content_to_string_to_posts_table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn("post_content","content");
        });
    }
}
