<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelephoneSpecification extends Model
{
    use HasFactory;

    protected $table = 'telephone_specifications';

    protected $fillable = [
        'telephone_id',
        'width',
        'height',
        'thickness',
        'weight',
        'material_corps',
        'screen_dioganal',
        'pixel_density',
        'display_resolution',
        'screen_matrix',
        'battery_type',
        'battery_capacity',
        'fast_charging',
        'wireless_charger',
        'connector',
        'peculliarities',
        'number_processor_cores',
        'video_processor',
        'gpu_frequency',
        'cpu',
        'frequency',
        'communication_standarts',
        'nfc',
        'blutooth',
        'wifi',
        'number_sim_slots',
        'satellite_navigation',
        'main_camera',
        'front_camera',
        'fetures_main_camera',
        'video_recording',
    ];
}
