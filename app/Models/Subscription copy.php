<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Subscription extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'remarks',
    ];

    protected $dates = ['installation_date'];

    /**
     * Relationships
    */
    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function disableAccount() {
        $this->status = false;
        $this->save();
    }

    public function enableAccount() {
        $this->status = true;
        $this->save();
    }
}
