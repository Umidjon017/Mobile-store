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
        Schema::create('product_telephones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telephone_category_id')->constrained('category_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('model');
            $table->string('slug');
            $table->foreignId('color_id')->constrained('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('memory_id')->constrained('telephone_memories')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('price');
            $table->boolean('badge_new')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('product_telephones');
    }
};
