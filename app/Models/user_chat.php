<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_chat extends Model
{
    use HasFactory;
    public function chat()
    {
        return $this->belongsTo("chats","chat_id","id");
    }
}
