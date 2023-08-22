<?php 

namespace App\Traits;
use App\Models\Address;

trait HasAddresses {

    /**
     * Relationships
     */
    public function addresses() {
        return $this->morphMany(\App\Models\Address::class, 'addressable');
    }

    /**
     * Mutators
     */
    public function getAddress($type) {
        $address = $this->addresses()->where('type', $type)->first();
        if (!$address) {
            $address = $this->addresses()->create([
                'type' => $type,
                'is_primary' => true
            ]);
        }
        return $address;
    }

    public function getBillingAddressAttribute() {
        return $this->addresses()->where('type', 'Billing')->firstOrCreate([
            'type' => 'Billing',
            'is_primary' => true
        ]);
    }

    /**
     * Helpers
     */
    public function saveNewAddress() {
        $address = new Address;

        $address->type = 'Billing';
        $address->is_primary = true;
        $address->addressable_id = $this->id;
        $address->addressable_type = get_class($this);
        $address->first_name = request('first_name');
        $address->last_name = request('last_name');
        $address->address_line_1 = request('address');
        $address->address_line_2 = '';
        $address->area = request('area');
        $address->coordinates = request('coordinates');
        $address->contact_no = request('contact_no');
        $address->save();
        
        $this->addresses()->save($address);
        
        return $address;
    }

    // get select options
    public function getAddressesSelectOption($type) {
        $options = [];
        foreach ($this->addresses()->where('type', $type)->orderBy('is_primary', 'DESC')->get() as $key => $address) {
            $options[] = ['label' => $address->address_line_1 .' '.$address->phone_number, 'value' => $address->id];
        }
        return $options;
    }

}