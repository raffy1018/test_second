<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NapPort extends Model
{
    use HasFactory;

    /**
     * Relationships
    */
    public function napDevice() {
        return $this->belongsTo(\App\Models\NapDevice::class, 'nap_device_id');
    }
    
    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }
}
