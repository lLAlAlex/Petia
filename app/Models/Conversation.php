<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function shelter()
    {
        return $this->belongsTo(User::class, 'shelterID');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
