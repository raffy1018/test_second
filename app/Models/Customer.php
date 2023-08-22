<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, HasUid, SoftDeletes;
    
    protected $fillable = [
        'account_no',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'gender',
        'birth_date',
        'address',
        'area',
        'coordinates',
    ];

    protected $appends = ['name'];

    public function rules() {
        
        return [
            'account_no' => 'required|unique:customers,account_no',
            'first_name' => 'required',
            'last_name' => 'required',
        ];

    }

    /**
     * Relationships
    */
    public function subscription() {
        return $this->hasOne(\App\Models\Subscription::class);
    }

    // public function tickets() {
    //     return $this->hasMany(\App\Models\Ticket::class);
    // }

    public function profile() {
        return $this->hasOne(\App\Models\AdvanceProfile::class);
    }

    public function installation() {
        return $this->hasOne(\App\Models\Installation::class);
    }

    public function billing() {
        return $this->hasOne(\App\Models\Billing::class);
    }

    public function transactions() {
        return $this->hasMany(\App\Models\Transaction::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public static function getAvailableCustomersSelectOptions() {
        $options = [];

        foreach(self::whereDoesntHave('subscription')->get() as $customer) {
            $options[] = ['label' => $customer->name, 'value' => $customer->id];
        }

        return $options;
    }

    public function getTotalBalanceAttribute() {
        $transactions = $this->transactions;
        $credit = 0;
        $debit = 0;
        $advance = false;

        foreach($transactions as $transaction) {
            if($transaction->credit != 0.00) {
                $credit += $transaction->credit;
            } else {
                $debit += $transaction->debit;
            }
        }

        $total = $credit - $debit;

        if($debit > $credit) {
            $advance = true;
            $total = $total * -1;
        }

        return [
            'total' => $total,
            'advance' => $advance
        ];
    }
}
