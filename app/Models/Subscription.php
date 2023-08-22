<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Subscription extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'customer_id',
        'service',
        'username',
        'password',
        'product_id',
        'credit_limit',
    ];

    /**
     * Rules
     */
    public function rules() {
        return [
            'customer_id' => 'required',
            'service' => 'required',
            'profile' => 'required',  
            'product_id' => 'required',
        ];
    }

    /**
     * Relationships
    */
    public function router() {
        return $this->belongsTo(\App\Models\Router::class, 'router_id');
    }

    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function product() {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function billings() {
        return $this->hasMany(\App\Models\Billing::class);
    }

    public function transactions() {
        return $this->hasMany(\App\Models\Transaction::class);
    }

    public function disableAccount() {
        $this->status = false;
        $this->save();
    }

    public function enableAccount() {
        $this->status = true;
        $this->save();
    }

    public function getBillingBalance() {
        return $this->billings()->sum('balance');
    }

    public function getLatestBillingDetails() {
        return \App\Models\Billing::where('subscription_id', $this->id)
                                    ->latest()
                                    ->first();
    }
}
