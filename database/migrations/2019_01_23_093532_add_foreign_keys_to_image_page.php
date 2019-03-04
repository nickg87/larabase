<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToImagePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_page', function (Blueprint $table) {
            //
            $table->foreign('page_id')->references('id')->on('page');
            $table->foreign('image_id')->references('id')->on('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_page', function (Blueprint $table) {
            //
            $table->dropForeign(['page_id']);
            $table->dropForeign(['image_id']);
        });
    }
}
