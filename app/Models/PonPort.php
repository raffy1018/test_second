<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PonPort extends Model
{
    use HasFactory;

    /**
     * Relationships
    */
    public function oltDevice() {
        return $this->belongsTo(\App\Models\OltDevice::class, 'olt_device_id');
    }

    public function napDevices() {
        return $this->hasMany(\App\Models\NapDevice::class);
    }

    public function getTotalNap() {
        return $this->napDevices->count();
    }

    public function getTotalOnu() {
        return \App\Models\AdvanceProfile::where('olt_device_id', $this->olt_device_id)
                                        ->where('pon_port_id', $this->id)
                                        ->whereNotNull('onu_name')
                                        ->count();
    }
}
