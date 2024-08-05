<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenageRequest;
use App\Http\Requests\UpdateMenageRequest;
use App\Models\Menage;
use App\Models\User;
use Illuminate\Http\Request;

class MenageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = User::whereHas('menage');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('prenom', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);

        return view('menages.index', compact('users','search'));
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
    public function store(StoreMenageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menage $menage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menage $menage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenageRequest $request, Menage $menage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menage $menage)
    {
        //
    }
}
