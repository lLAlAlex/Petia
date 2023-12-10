<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomeDatas()
    {
        $acceptedAdoptionPetIds = Adoption::where('status', 'Accepted')->pluck('petID');
        $pets = Pet::whereNotIn('id', $acceptedAdoptionPetIds)->take(5)->get();
        $wishlists = Wishlist::where('userID', auth()->user()->id)->get();

        return view('home', compact('pets', 'wishlists'));
    }
}
