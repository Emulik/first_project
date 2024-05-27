<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->unsignedBigInteger('category_id')->nullable();
            // // Եթե ցանկանում ենք տանք անուն դաշտին ինդեքսին, ավելացնելու կամ ջնջելու համար

            // $table->index('category_id','post_category_idx')->unsigned();
            // // on()- թե որ աղյուսակին է հղվում և references- թե որ դաշտին է հղվում
            // $table->foreign("category_id")->references("id")->on("categories")->onDelete("set null");
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
            $table->dropForeign('post_category_fk');
            $table->dropIndex('post_category_idx');
            
     
        });
    }
}
