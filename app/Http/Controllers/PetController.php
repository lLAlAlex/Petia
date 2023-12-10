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
        $pets = Pet::where('isAdopted', 0)->simplePaginate(5);
        $wishlists = Wishlist::where('userID', auth()->user()->id)->get();
        $adoptions = Adoption::where('status', 'Accepted');

        return view('pets', compact('pets', 'wishlists'));
    }

    public function detailIndex($id)
    {
        $pet = Pet::where('id', $id)->first();

        return view('/detail', compact('pet'));
    }
}
