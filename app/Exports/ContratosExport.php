<?php

namespace App\Exports;

use App\Models\Contrato;
use Illuminate\COntracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContratosExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('contratos.export', [
            'contratos' => Contrato::all(),
        ]);
    }
}
