<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villa_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('villa_id')->unsigned();
            $table->string('title');
         
            $table->string('locale')->index();
            $table->unique(['villa_id','locale']);
            $table->foreign('villa_id')->references('id')->on('villas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villa_translations');
    }
};
