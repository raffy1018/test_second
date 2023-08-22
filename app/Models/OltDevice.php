<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use App\Models\PonPort;

class OltDevice extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'name',
        'description',
        'standard',
        'pon_ports_no',
        'remarks',
    ];

    /**
     * Relationships
    */
    public function ponPorts() {
        return $this->hasMany(\App\Models\PonPort::class);
    }

    public function createNewPonPorts() {
        $pon_ports_no = $this->pon_ports_no;

        for($i=1; $i<=$pon_ports_no; $i++) {
            $pon = new PonPort;

            $pon->olt_device_id = $this->id;
            $pon->port = $i;
            $pon->save();
        }
    }

    public function getTotalNap() {
        $count = 0;
        foreach($this->ponPorts as $ponPort) {
            $count += $ponPort->napDevices->count();
        }
        return $count;
    }

    public function getTotalOnu() {
        return \App\Models\AdvanceProfile::where('olt_device_id', $this->id)->whereNotNull('onu_name')->count();
    }

    public static function getStandardSelectOptions() {
        return [
            ['label' => 'IEEE 802.3ah (EPON)', 'value' => 'IEEE 802.3ah (EPON)'],
            ['label' => 'ITU-T G.984 (GPON)', 'value' => 'ITU-T G.984 (GPON)'],
        ];
    }

    public static function getSelectOptions() {
        $options = [];

        foreach($this-all() as $olt) {
            $options[] = ['label' => $olt->name, 'value' => $olt->name];
        }

        return $options;
    }
}
