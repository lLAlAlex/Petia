<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomeDatas()
    {
        $pets = Pet::where('isAdopted', 0)->take(5)->get();
        $wishlists = Wishlist::where('userID', auth()->user()->id)->get();

        return view('home', compact('pets', 'wishlists'));
    }
}
