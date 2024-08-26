<?php

namespace App\Http\Controllers;

// use App\Exports\MenagesExport;
use App\Models\Menage;
use Barryvdh\DomPDF\Facade\Pdf;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class MenageExportController extends Controller
{
    public function export(Request $request)
    {
        // Récupérer les filtres
        $secteurId = $request->input('secteur_id');
        $serviceId = $request->input('service_id');

        // Construire la requête avec ou sans filtres
        $query = Menage::query();

        if ($secteurId) {
            $query->where('secteur_id', $secteurId);
        }

        if ($serviceId) {
            $query->where('service_id', $serviceId);
        }

        // Récupérer les ménages filtrés
        $menages = $query->get();

        // Générer le PDF avec les données filtrées
        $pdf = Pdf::loadView('menages.export_pdf', ['menages' => $menages]);

        return $pdf->download('menages.pdf');
    }


    // public function exportPdf()
    // {
    //     $menages = Menage::all();

    //     $pdf = Pdf::loadView('menages.export_pdf', compact('menages'));

    //     return $pdf->download('menages.pdf');
    // }

}
