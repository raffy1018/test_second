<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Installation extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'date',
        'remarks',
    ];

    /**
     * Relationships
    */
    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }
}
