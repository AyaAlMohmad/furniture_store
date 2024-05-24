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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
         
            $table->string('image_main')->nullable();
            // $table->string('video')->nullable();
            // $table->decimal('price',8,2,true);
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            // $table->foreignId('designer_id')->constrained('designers')->cascadeOnDelete();
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
        Schema::dropIfExists('products');
    }
};
