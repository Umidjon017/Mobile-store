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
        Schema::create('telephone_full_descs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telephone_id')->nullable()->constrained('product_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('full_title')->nullable();
            $table->string('full_image_url')->nullable();
            $table->text('full_description')->nullable();
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
        Schema::dropIfExists('telephone_full_descs');
    }
};
