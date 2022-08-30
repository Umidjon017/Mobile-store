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
        Schema::create('telephone_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telephone_id')->nullable()->constrained('product_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('thickness')->nullable();
            $table->string('weight')->nullable();
            $table->string('material_corps')->nullable();
            $table->string('screen_dioganal')->nullable();
            $table->string('pixel_density')->nullable();
            $table->string('display_resolution')->nullable();
            $table->string('screen_matrix')->nullable();
            $table->string('battery_type')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('fast_charging')->nullable();
            $table->string('wireless_charger')->nullable();
            $table->string('connector')->nullable();
            $table->string('peculliarities')->nullable();
            $table->string('number_processor_cores')->nullable();
            $table->string('video_processor')->nullable();
            $table->string('gpu_frequency')->nullable();
            $table->string('cpu')->nullable();
            $table->string('frequency')->nullable();
            $table->string('communication_standarts')->nullable();
            $table->string('nfc')->nullable();
            $table->string('blutooth')->nullable();
            $table->string('wifi')->nullable();
            $table->string('number_sim_slots')->nullable();
            $table->string('satellite_navigation')->nullable();
            $table->string('main_camera')->nullable();
            $table->string('front_camera')->nullable();
            $table->string('fetures_main_camera')->nullable();
            $table->string('video_recording')->nullable();
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
        Schema::dropIfExists('telephone_specifications');
    }
};
