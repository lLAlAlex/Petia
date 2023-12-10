<?php

namespace App\Http\Controllers;

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
        $wishlists = Wishlist::where('userID', auth()->user()->id)->paginate(5);

        return view('/wishlist', compact('wishlists'));
    }
}
