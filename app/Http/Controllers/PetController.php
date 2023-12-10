<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function getPetDatas()
    {
        $acceptedAdoptionPetIds = Adoption::where('status', 'Accepted')->pluck('petID');
        $pets = Pet::whereNotIn('id', $acceptedAdoptionPetIds)->simplePaginate(5);
        $wishlists = Wishlist::where('userID', auth()->user()->id)->get();

        return view('pets', compact('pets', 'wishlists'));
    }

    public function detailIndex($id)
    {
        $pet = Pet::where('id', $id)->first();

        return view('/detail', compact('pet'));
    }
}
