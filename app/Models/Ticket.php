<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use App\Models\TicketFile;

class Ticket extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'reference_no',
        'subject',
        'customer_id',
        'message',
    ];
    
    /**
     * Relationships
    */
    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }
    
    public function files() {
        return $this->hasMany(\App\Models\TicketFile::class, 'ticket_id');
    }

    public function saveFilesUpload($files) {
        foreach($files as $file) {
            $ticketFile = new TicketFile;

            $ticketFile->ticket_id = $this->id;
            $ticketFile->save();

            $ticketFile->saveFile($file);
        }
    }
}
