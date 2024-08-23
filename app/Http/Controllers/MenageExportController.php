<?php

namespace App\Http\Controllers;

// use App\Exports\MenagesExport;
use App\Models\Menage;
use Barryvdh\DomPDF\Facade\Pdf;
// use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Http\Request;

class MenageExportController extends Controller
{
    public function exportPdf()
    {
        $menages = Menage::all();

        $pdf = Pdf::loadView('menages.export_pdf', compact('menages'));

        return $pdf->download('menages.pdf');
    }

}
