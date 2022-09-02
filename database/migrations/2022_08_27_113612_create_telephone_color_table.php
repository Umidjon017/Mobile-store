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
        Schema::create('telephone_color', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telephone_id')->nullable()->constrained('product_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('color_id')->nullable()->constrained('colors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('telephone_color');
    }
};
