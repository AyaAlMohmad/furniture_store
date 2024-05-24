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
        Schema::create('designer_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('designer_id')->unsigned();
            $table->text('description');
            $table->string('locale')->index();
            $table->unique(['designer_id','locale']);
            $table->foreign('designer_id')->references('id')->on('designers')->onDelete('cascade');
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
        Schema::dropIfExists('designer_translations');
    }
};
