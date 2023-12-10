<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function createAdoption($id)
    {
        $pet = Pet::find($id)->first();

        $adoption = new Adoption();
        $adoption->petID = $pet->id;
        $adoption->userID = auth()->user()->id;
        $adoption->shelterID = $pet->shelterID;
        $adoption->adoptionDate = Carbon::now();
        $adoption->status = 'Pending';

        $adoption->save();

        // alert('')

        return redirect('/');
    }

    public function index()
    {
        $requests = Adoption::where('status', 'Pending')->get();

        return view('/request', compact('requests'));
    }

    public function acceptRequest($id)
    {
        $request = Adoption::find($id);
        $request->status = 'Accepted';

        $request->save();

        return redirect()->back();
    }

    public function rejectRequest($id)
    {
        $request = Adoption::find($id);
        $request->status = 'Rejected';

        $request->save();

        return redirect()->back();
    }

    public function createIndex()
    {
        return view('/newadoption');
    }
}
