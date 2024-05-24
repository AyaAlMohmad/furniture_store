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
        Schema::create('solution_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('solution_id')->unsigned();
            $table->string('title');
            $table->text('description');
            // $table->text('short_description');
            $table->string('locale')->index();
            $table->unique(['solution_id','locale']);
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
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
        Schema::dropIfExists('solution_translations');
    }
};
