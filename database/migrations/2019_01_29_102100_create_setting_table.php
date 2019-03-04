<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('title');
            $table->text('about')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('head_scripts')->nullable();
            $table->text('foot_scripts')->nullable();
            $table->text('google_maps')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('setting')->insert(
            array(
                'name' => 'LaraBase',
                'title' => 'LaraBase CMS',
                'about' => 'LaraBase CMS',
                'description' => 'Put here some about text',
                'keywords' => 'Put here some relevant keywords',
                'phone' => '0741060742',
                'email' => 'admin@larabase.loc',
                'created_at' => now(),
                'updated_at'=> now()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
