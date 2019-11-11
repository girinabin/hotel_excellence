<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_title');
            $table->longtext('summary');
            $table->longtext('description')->nullable();
            $table->string('cover_image');
            $table->string('alt_cover');
            $table->string('status');
            $table->string('images')->nullable();
            $table->string('alt_images')->nullable();
            $table->string('room_slug');
            $table->string('seo_title');
            $table->string('seo_keyword');
            $table->longtext('seo_description');
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
        Schema::dropIfExists('rooms');
    }
}
