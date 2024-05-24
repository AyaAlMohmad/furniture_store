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
        Schema::create('faqe_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faqe_id')->unsigned();
            $table->text('question');
            $table->text('answer');
            $table->string('locale')->index();
            $table->unique(['faqe_id','locale']);
            $table->foreign('faqe_id')->references('id')->on('faqes')->onDelete('cascade');
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
        Schema::dropIfExists('faqe_translations');
    }
};
