<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('excerpt_uz')->nullable();
            $table->longText('excerpt_ru')->nullable();
            $table->longText('excerpt_en')->nullable();
            $table->text('body_uz')->nullable();
            $table->text('body_ru')->nullable();
            $table->text('body_en')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('meta_description_uz')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_keywords_uz')->nullable();
            $table->text('meta_keywords_ru')->nullable();
            $table->text('meta_keywords_en')->nullable();
            $table->enum('template', ['about','contacts','home','form-page','default'])->default('default');
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
        Schema::dropIfExists('pages');
    }
}
