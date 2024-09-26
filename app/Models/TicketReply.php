<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'reply_id',
        'message'
    ];

    public function user(){ 
        return $this->belongsTo(User::class);
    }

    public function user_reply(){ 
        return $this->belongsTo(User::class,'reply_id', 'id');
    }
}
