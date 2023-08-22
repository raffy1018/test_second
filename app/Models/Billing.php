<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Billing extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'type',
        'customer_id',
        'start_date',
        'bill_date',
        'cycle',
    ];

    /**
     * Relationships
    */
    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public static function generateSalesInvoice() {
        $date = \Carbon\Carbon::now()->format('Ymd');
        $random = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return "SI-{$date}{$random}";
    }
}
