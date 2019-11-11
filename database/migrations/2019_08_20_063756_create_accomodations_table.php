<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('accomodation_name');
            $table->longtext('summary');
            $table->longtext('description');
            $table->string('accomodation_image');
            $table->string('image_alt');
            $table->string('status');
            $table->string('seo_title');
            $table->longtext('seo_description');
            $table->string('seo_keyword');
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
        Schema::dropIfExists('accomodations');
    }
}
