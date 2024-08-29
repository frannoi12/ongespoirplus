<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLiquideRequest;
use App\Http\Requests\UpdateLiquideRequest;
use App\Models\Liquide;
use App\Models\Menage;

class LiquideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // dd($id);
        $menage = Menage::findOrFail($id);
        // dd($menage);
        return view('liquides.create',compact('menage'))->with('sucess','Paiement en liquide en cours');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLiquideRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Liquide $liquide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liquide $liquide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiquideRequest $request, Liquide $liquide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liquide $liquide)
    {
        //
    }
}
