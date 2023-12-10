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
        $pet = Pet::where('id', $id)->first();

        $adoption = new Adoption();
        $adoption->petID = $id;
        $adoption->userID = auth()->user()->id;
        $adoption->shelterID = $pet->shelterID;
        $adoption->adoptionDate = Carbon::now();
        $adoption->status = 'Pending';

        $adoption->save();

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

        $pet = Pet::find($request->petID);
        $pet->isAdopted = 1;
        $pet->save();

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

    public function historyIndex()
    {
        $histories = Adoption::where('userID', auth()->user()->id)->get();

        return view('/history', compact('histories'));
    }

    public function historyDetailIndex($id)
    {
        $history = Adoption::where('id', $id)->first();

        return view('/historydetail', compact('history'));
    }
}
