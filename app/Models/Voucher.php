<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Voucher extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'voucher',
        'price',
        'profile',
        'expired_at',
        'purchased_by',
    ];

    protected $dates = ['expired_at'];

    /**
     * Rules
     */
    public function rules() {
        return [
            'expired_at' => 'required|date|after:today',
            'price' => 'required',
        ];
    }
}
