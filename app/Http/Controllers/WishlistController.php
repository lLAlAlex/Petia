<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        $wishlist = new Wishlist();

        $wishlist->userID = auth()->user()->id;
        $wishlist->petID = $id;
        $wishlist->save();

        return redirect()->back();
    }

    public function removeFromWishlist($id)
    {
        $wishlist = Wishlist::find($id);

        if (isset($wishlist)) {
            $wishlist->delete();
        }
        return redirect()->back();
    }

    public function wishlistIndex()
    {
        $wishlistPetIds = Wishlist::where('userID', auth()->user()->id)->pluck('petID');
        $pets = Pet::where('isAdopted', 0)->pluck('id');
        $wishlists = Wishlist::where('userID', auth()->user()->id)->whereIn('petID', $pets)->simplePaginate(5);

        return view('/wishlist', compact('wishlists'));
    }
}
