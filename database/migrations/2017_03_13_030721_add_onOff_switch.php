<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnOffSwitch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concepts', function (Blueprint $table) {
            $table->boolean('on_off')->default(true);
        });
        Schema::table('processes', function (Blueprint $table) {
            $table->boolean('on_off')->default(true);
        });
        Schema::table('process_steps', function (Blueprint $table) {
            $table->boolean('on_off')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concepts', function (Blueprint $table) {
            $table->dropColumn('on_off');
        });
        Schema::table('processes', function (Blueprint $table) {
            $table->dropColumn('on_off');
        });
        Schema::table('process_steps', function (Blueprint $table) {
            $table->dropColumn('on_off');
        });
    }
}
