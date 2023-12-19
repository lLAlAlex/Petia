<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function createPet(Request $request)
    {
        $rules = [
            'name' => 'required',
            'age' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'size' => 'required',
            'image' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $pet = new Pet();
        $pet->name = $request->name;
        $pet->animalType = $request->type;
        $pet->age = $request->age;
        $pet->shelterID = auth()->user()->id;
        $pet->breed = $request->breed;
        $pet->color = $request->color;
        $pet->description = $request->description;
        $pet->gender = $request->gender;
        $pet->size = $request->size;
        $pet->isAdopted = 0;

        $file = $request->file('image');

        if ($file != NULL) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/', $file, $imageName);
            $pet->image = $imageName;
        }
        $pet->save();

        Session::flash('message', 'Pet Added Successfully!');

        return redirect()->back();
    }
}
