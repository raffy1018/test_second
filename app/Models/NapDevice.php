<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use App\Models\NapPort;

class NapDevice extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'pon_port_id',
        'name',
        'description',
        'nap_no',
        'nap_ports_no',
        'coordinates',
    ];

    /**
     * Relationships
    */
    public function ponPort() {
        return $this->belongsTo(\App\Models\PonPort::class, 'pon_port_id');
    }

    public function napPorts() {
        return $this->hasMany(\App\Models\NapPort::class);
    }

    public function createNewNapPorts() {
        $nap_ports_no = $this->nap_ports_no;

        for($i=1; $i<=$nap_ports_no; $i++) {
            $nap = new NapPort;

            $nap->nap_device_id = $this->id;
            $nap->port = $i;
            $nap->save();
        }
    }

    public function getTotalOnu() {
        return \App\Models\AdvanceProfile::where('olt_device_id', $this->ponPort->oltDevice->id)
                                        ->where('pon_port_id', $this->pon_port_id)
                                        ->where('nap_device_id', $this->id)
                                        ->whereNotNull('onu_name')
                                        ->count();
    }

    public static function checkNapNoAvailability($request) {
        $nap = self::where('pon_port_id', $request['pon_port_id'])->where('nap_no', $request['nap_no'])->first();

        return $nap ? false : true;
    }

    public function getAvailablePorts() {
        $profiles_count = \App\Models\AdvanceProfile::where('olt_device_id', $this->ponPort->oltDevice->id)
                            ->where('pon_port_id', $this->pon_port_id)
                            ->where('nap_device_id', $this->id)
                            ->count();

        return $this->nap_ports_no - $profiles_count;
    }
}
