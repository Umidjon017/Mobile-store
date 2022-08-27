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
            $table->foreignId('telephone_id')->constrained('product_telephones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('width');
            $table->string('height');
            $table->string('thickness');
            $table->string('weight');
            $table->string('material_corps');
            $table->string('screen_dioganal');
            $table->string('pixel_density');
            $table->string('display_resolution');
            $table->string('screen_matrix');
            $table->string('battery_type');
            $table->string('battery_capacity');
            $table->string('fast_charging');
            $table->string('wireless_charger');
            $table->string('connector');
            $table->string('peculliarities');
            $table->string('number_processor_cores');
            $table->string('video_processor');
            $table->string('gpu_frequency');
            $table->string('cpu');
            $table->string('frequency');
            $table->string('communication_standarts');
            $table->string('nfc');
            $table->string('blutooth');
            $table->string('wifi');
            $table->string('number_sim_slots');
            $table->string('satellite_navigation');
            $table->string('main_camera');
            $table->string('front_camera');
            $table->string('fetures_main_camera');
            $table->string('video_recording');
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
