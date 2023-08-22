<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Transaction extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'subscription_id',
        'customer_id',
        'type',
        'date',
        'reference_no',
        'description',
    ];
    
    /**
    * Rules
    */
   public function rules() {
       return [
           'type' => 'required',
           'date' => 'required',
           'amount' => 'required',
       ];
   }

    /**
        * Relationships
    */
    public function subscription() {
        return $this->belongsTo(\App\Models\Subscription::class, 'subscription_id');
    }

    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function getInvoiceAttribute() {
        $acro = '';
        $type = $this->type;
        switch($type) {
            case 'Payment':
                $acro = 'PR-';
                break;

            case 'Sales Invoice':
                $acro = 'SI-';
                break;
                
            case 'Rebate':
                $acro = 'RB-';
                break;
                
            case 'Discount':
                $acro = 'DC-';
                break;
                
            default:
        }

        return $acro . $this->invoice_no;
    }

    public function getCreatedByAttribute() {
        $model = $this->creatable_type;
        $id = $this->creatable_id;

        switch($model) {
            case 'App\Models\User':
                $user = \App\Models\User::find($id);

                return $user->name;
            
            default;
        }
    }

    public static function generateSalesInvoice() {
        do {
            $date = \Carbon\Carbon::now()->format('Ymd');
            $random = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            $invoice_no = "{$date}{$random}";
        } while (self::where('invoice_no', $invoice_no)->exists());

        return $invoice_no;
    }

   public static function getTypeSelectOptions() {
       return [
            ['label' => 'Payment', 'value' => 'Payment'],
            ['label' => 'Sales Invoice', 'value' => 'Sales Invoice'],
            ['label' => 'Rebate', 'value' => 'Rebate'],
            ['label' => 'Discount', 'value' => 'Discount'],
       ];
   }

   public static function getDescriptionSelectOptions() {
       return [
            ['label' => 'No Description', 'value' => 'No Description'],
            ['label' => 'Custom Description', 'value' => 'Custom Description'],
            ['label' => 'Plan 1500', 'value' => 'Plan 1500'],
            ['label' => 'Plan 1000', 'value' => 'Plan 1000'],
            ['label' => 'Plan 800', 'value' => 'Plan 800'],
            ['label' => 'Tes1500', 'value' => 'Tes1500'],
       ];
   }
}
