<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAddresColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("cameras", function (Blueprint $table) {
            $table->dropColumn("addres");
        });
        Schema::table("cameras", function (Blueprint $table) {
            $table->string("link");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table("cameras", function (Blueprint $table) {
            $table->dropColumn("link");
        });
        Schema::table("cameras", function (Blueprint $table) {
            $table->string("addres");
        });
    }
}
