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
            $table->integer('parentConcept_id')->unsigned();
            $table->foreign('parentConcept_id')->references('id')->on('concepts');
            $table->integer('childConcept_id')->unsigned();
            $table->foreign('childConcept_id')->references('id')->on('concepts');
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
