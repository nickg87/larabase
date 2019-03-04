<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToFilePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_page', function (Blueprint $table) {
            //
            $table->foreign('page_id')->references('id')->on('page');
            $table->foreign('file_id')->references('id')->on('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_page', function (Blueprint $table) {
            //
            $table->dropForeign(['page_id']);
            $table->dropForeign(['file_id']);
        });
    }
}
