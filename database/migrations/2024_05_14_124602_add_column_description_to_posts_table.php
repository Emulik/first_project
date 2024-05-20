<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDescriptionToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->text("description")->nullable();
            // Եթե ցանկանում ենք տեղափոխել դաշտը։
            // php artisan migrate:rollback 
            // Այս հրահանգից հետո թարմացնել phpmyadmin_ը
            $table->text("description")->nullable()->after("content");
            // php artisan migrate :
            // Հաջորդը ջնջելու համար։
            // php artisan make:migration delete_column_description_to_posts_table

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
            $table->dropColumn("description");
        });
    }
}
