<?php

namespace App\Http\Controllers;

use App\Exports\MenagesExport;
use App\Models\Menage;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class MenageExportController extends Controller
{
    public function export(Request $request)
    {
        // Vérifie si l'utilisateur a choisi d'exporter sans filtre
        if ($request->has('no_filter')) {
            $menages = Menage::all();
        } else {
            $filterType = $request->input('filterType');

            // Filtrage par secteur ou tarif
            $menages = Menage::when($filterType === 'sector', function ($query) {
                return $query->orderBy('secteur_id');
            })->when($filterType === 'tariff', function ($query) {
                return $query->orderBy('tariff_id');
            })->get();
        }

        // Export Excel
        if ($request->has('export_excel')) {
            return Excel::download(new MenagesExport($menages), 'menages.xlsx');
        }

        // Export PDF
        if ($request->has('export_pdf')) {
            $pdf = Pdf::loadView('exports.menages', compact('menages'));
            return $pdf->download('menages.pdf');
        }
    }

    public function exportPdf()
    {
        $menages = Menage::all();

        $pdf = Pdf::loadView('menages.export_pdf', compact('menages'));

        return $pdf->download('menages.pdf');
    }

}
