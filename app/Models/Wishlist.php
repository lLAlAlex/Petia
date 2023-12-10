<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'petID');
    }
}