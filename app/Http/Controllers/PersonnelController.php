<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonnelRequest;
use App\Http\Requests\UpdatePersonnelRequest;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        $pagination_number = 5;
        if ($search) {
            $users = User::where("name", "like", "%" . $search . "%")
                ->orWhere("prenom", "like", "%" . $search . "%")
                ->orWhere("email", "like", "%" . $search . "%")
                ->paginate($pagination_number);
            $personnels = Personnel::all();

        } else {
            $users = User::with('personnel')->paginate($pagination_number);
            $personnels = Personnel::paginate($pagination_number);
        }
        //dd($users);

        // $users = User::paginate($pagination_number);

        return view('personnels.index', compact('users','search','personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonnelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonnelRequest $request, Personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        //$personnel->load('personnel');

        //dd($personnel, $personnel->user);

        /*if ($personnel) {
            $personnel->user->delete();
        }*/

        $personnel->user->delete();

        return redirect()->route('personnels.index')->with('success', 'Produit supprimé avec succès');
    }
}
