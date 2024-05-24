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
        Schema::create('catalog_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catalog_id')->unsigned();
            $table->string('title');
         
            $table->string('locale')->index();
            $table->unique(['catalog_id','locale']);
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');
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
        Schema::dropIfExists('catalog_translations');
    }
};
