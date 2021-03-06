<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdToImagePage extends Migration
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
            $table->integer('ord')->nullable()->after('page_id')->unsigned()->index('ord');

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
            $table->dropColumn('ord');
        });
    }
}
