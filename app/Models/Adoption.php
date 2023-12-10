<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'petID');
    }

    public function shelter()
    {
        return $this->belongsTo(User::class, 'shelterID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
