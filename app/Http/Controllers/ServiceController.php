<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Requête pour récupérer les services avec ou sans filtre de recherche
        $services = Service::query()
            ->when($search, function ($query, $search) {
                return $query->where('code_service', 'like', '%' . $search . '%')
                             ->orWhere('type_service', 'like', '%' . $search . '%');
            })
            ->paginate(10); // Pagination des résultats

        // Retourne la vue avec les données des services
        return view('services.index', compact('services', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $service = new Service(); // Crée un nouvel objet vide pour la création
        return view('services.create_or_update', compact('success'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_service' => 'required|string|max:255',
            'type_service' => 'required|string|max:255',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.create_or_update', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'code_service' => 'required|string|max:255',
            'type_service' => 'required|string|max:255',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
