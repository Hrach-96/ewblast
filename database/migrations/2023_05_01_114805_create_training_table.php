<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->string('title_am')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('content_am')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('display_main')->default(0);
            $table->foreign('category_id')->references('id')->on('training_categories')->onDelete('cascade');
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
        Schema::dropIfExists('training');
    }
}
