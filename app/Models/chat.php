<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    public function dchat()
    {
        return $this->hasMany("user_chats","chat_id","id");
    }
}
