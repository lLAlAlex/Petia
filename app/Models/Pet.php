<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function shelter()
    {
        return $this->belongsTo(User::class, 'shelterID');
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }
}
