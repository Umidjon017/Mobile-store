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
        Schema::create('telephone_memory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telephone_id')->nullable()->constrained('product_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('memory_id')->nullable()->constrained('telephone_memories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('telephone_memory');
    }
};
