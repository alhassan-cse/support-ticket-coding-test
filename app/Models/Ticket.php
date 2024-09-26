<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TicketReply;

class Ticket extends Model
{
    use HasFactory;

    public function user(){ 
        return $this->belongsTo(User::class);
    }

    public function reply_ticket(){ 
        return $this->hasMany(TicketReply::class);
    }
}
