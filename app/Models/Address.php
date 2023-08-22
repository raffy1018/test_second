<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $fillable = ['type', 'is_primary', 'address_line_1', 'address_line_2', 'area', 'coordinates', 'first_name', 'last_name', 'notes', 'contact_no'];
    
    /**
     * Rules
     */
    public function rules() {
        return [
            'address' => 'required'  
        ];
    }

    /**
     * Mutators
     */
    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * Relationships
     */
    public function addressable() {
        return $this->morphTo();
    }
}
