<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('text_uz');
            $table->text('text_ru');
            $table->text('text_en');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('direction_uz');
            $table->string('direction_ru');
            $table->string('direction_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
