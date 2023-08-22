<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_no',
        'remarks_1',
        'remarks_2',
        'onu_name',
        'mac_address',
    ];

    /**
     * Relationships
    */
    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function getOltNameAttribute() {
        $olt = \App\Models\OltDevice::find($this->olt_device_id);
        return $olt->name;
    }

    public function getPonPortAttribute() {
        $pon = \App\Models\PonPort::find($this->pon_port_id);
        return $pon->port;
    }

    public function getNapNameAttribute() {
        $nap = \App\Models\NapDevice::find($this->nap_device_id);
        return $nap->name;
    }

    public function getNapPortAttribute() {
        $port = \App\Models\NapPort::find($this->nap_port_id);
        return $port->port;
    }
}
