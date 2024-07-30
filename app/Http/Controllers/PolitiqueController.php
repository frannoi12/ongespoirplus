<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolitiqueRequest;
use App\Http\Requests\UpdatePolitiqueRequest;
use App\Models\Politique;

class PolitiqueController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolitiqueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Politique $politique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Politique $politique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolitiqueRequest $request, Politique $politique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Politique $politique)
    {
        //
    }
}
