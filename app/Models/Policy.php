<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Policy extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'type',
        'name',
        'filter',
        'pppoe_action',
        'pppoe_to_profile',
        'pppoe_over_due',
        'pppoe_grace_period',
        'pppoe_return_balance',
        'hotspot_action',
        'hotspot_to_profile',
        'hotspot_over_due',
        'hotspot_grace_period',
        'hotspot_return_balance',
    ];
    
    /**
    * Rules
    */
   public function rules() {
       return [
           'name' => 'required',
           'filter' => 'required',
           'recipient' => 'required',
       ];
   }

   public static function getRecipientSelectOptions() {
       return [
            ['label' => 'All', 'value' => 'All'],
            ['label' => 'Name', 'value' => 'Name'],
            ['label' => 'Area', 'value' => 'Area'],
       ];
   }

   public static function getFilterSelectOptions() {
       return [
            ['label' => 'All', 'value' => 'All'],
            ['label' => 'By Name', 'value' => 'By Name'],
            ['label' => 'By Area', 'value' => 'By Area'],
       ];
   }

   public static function getOverDueSelectOptions() {
       return [
            ['label' => 'More than 1 month', 'value' => 'More than 1 month'],
            ['label' => 'More than 2 months', 'value' => 'More than 2 months'],
            ['label' => 'More than 3 months', 'value' => 'More than 3 months'],
            ['label' => 'More than 4 months', 'value' => 'More than 4 months'],
            ['label' => 'More than 5 months', 'value' => 'More than 5 months'],
            ['label' => 'More than credit limit', 'value' => 'More than credit limit'],
       ];
   }

   public static function getReturnBalanceSelectOptions() {
       return [
            ['label' => 'Zero Balance', 'value' => 'Zero Balance'],
            ['label' => 'Less than 1 month', 'value' => 'Less than 1 month'],
            ['label' => 'Less than 2 months', 'value' => 'Less than 2 months'],
            ['label' => 'Less than 3 months', 'value' => 'Less than 3 months'],
            ['label' => 'Less than 4 months', 'value' => 'Less than 4 months'],
            ['label' => 'Less than 5 months', 'value' => 'Less than 5 months'],
            ['label' => 'Less than credit limit', 'value' => 'Less than credit limit'],
       ];
   }
}
