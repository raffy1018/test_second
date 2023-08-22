<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;

class Expense extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'invoice_no',
        'date',
        'amount',
        'supplier',
        'description',
    ];

    public static function getNextInvoiceNumber()
    {
        $last = self::latest('id')->first();
        $number = $last ? $last->id + 1 : 1;
        $invoice = 'INV-' . str_pad($number, 5, '0', STR_PAD_LEFT);

        return $invoice;
    }
    
    /**
    * Rules
    */
   public function rules() {
       return [
           'invoice_no' => 'required|unique:expenses,invoice_no,'.$this->id,
           'description' => 'required',
           'date' => 'required',
           'amount' => 'required',
           'supplier' => 'required',
       ];
   }
}
