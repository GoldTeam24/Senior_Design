<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptConceptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_concept', function (Blueprint $table) {
            $table->integer('parent_concept_id')->unsigned();
            $table->foreign('parent_concept_id')->references('id')->on('concepts');
            $table->integer('child_concept_id')->unsigned();
            $table->foreign('child_concept_id')->references('id')->on('concepts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concept_concept');
    }
}
