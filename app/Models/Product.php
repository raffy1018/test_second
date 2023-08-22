<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Product extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
    ];

    /**
     * Rules
     */
    public function rules() {
        return [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',  
            'price' => 'required',
        ];
    }

    /**
     * Relationships
    */
    public function subscription() {
        return $this->hasOne(\App\Models\Subscription::class);
    }

    public static function getTypeSelectOptions() {
        return [
            ['label' => 'Monthly Recurring Charge (MRC)', 'value' => 'MRC'],
            ['label' => 'One Time Charge (OTC)', 'value' => 'OTC'],
        ];
    }

    public static function getSelectOptions() {
        $options = [];

        foreach(self::all() as $product) {
            $options[] = ['label' => $product->name, 'value' => $product->id];
        }

        return $options;
    }
}
