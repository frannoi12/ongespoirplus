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
        // Recherche par 'code_service' ou 'type_service'
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
        // Retourne la vue de création avec un message de succès optionnel
        return view('services.create_or_update')->with('success', 'Création d\'un service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des champs requis
        $validatedData = $request->validate([
            'code_service' => 'required|string|max:255',
            'type_service' => 'required|string|max:255',
        ]);

        // Création du nouveau service
        Service::create($validatedData);

        // Redirection vers l'index avec un message de succès
        return redirect()->route('services.index')->with('success', 'Service ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        // Retourne la vue détaillée du service
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // Pas besoin de faire un find() ici car le service est déjà injecté
        return view('services.create_or_update', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Validation des champs requis
        $validatedData = $request->validate([
            'code_service' => 'required|string|max:255|regex:/^[^0-9]*$/',
            'type_service' => 'required|string|max:255|regex:/^[^0-9]*$/',
        ]);

        // Mise à jour du service existant
        $service->update($validatedData);

        // Redirection vers l'index avec un message de succès
        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Suppression du service
        $service->delete();

        // Redirection vers l'index avec un message de succès
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
