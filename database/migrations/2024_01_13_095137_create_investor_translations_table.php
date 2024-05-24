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
        Schema::create('investor_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('investor_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->text('short_description');
            $table->string('locale')->index();
            $table->unique(['investor_id','locale']);
            $table->foreign('investor_id')->references('id')->on('investors')->onDelete('cascade');
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
        Schema::dropIfExists('investor_translations');
    }
};
