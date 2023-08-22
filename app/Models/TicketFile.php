<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    use HasFactory;

    public function ticket() {
        return $this->belongsTo(\App\Models\Ticket::class);
    }

    public function saveFile($file) {
        $filename = \Str::random(40).'.'.$file->extension();
        $path = $file->storeAs('public/ticket/', $filename);
        $this->file = 'ticket/'.$filename;
        $this->save();
    }
}
