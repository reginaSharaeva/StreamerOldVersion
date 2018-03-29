<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('camera_id')->unsigned();
            $table->foreign('camera_id')->references('id')->on('cameras')->onDelete('cascade');
            $table->string('name');
            $table->string('link')->nullable();
            $table->integer('size')->nullable();
        });

        Schema::table('users', function ($table) {
            $table->integer('memory')->default("10000");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');

        Schema::table('users', function ($table) {
            $table->dropColumn('memory');
        });
    }
}
