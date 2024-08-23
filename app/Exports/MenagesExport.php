<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MenagesExport implements FromView
{
    protected $menages;

    public function __construct($menages)
    {
        $this->menages = $menages;
    }

    public function view(): View
    {
        return view('exports.menages', [
            'menages' => $this->menages
        ]);
    }
}
