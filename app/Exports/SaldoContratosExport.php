<?php

namespace App\Exports;

use App\Models\Movimientos;
use App\Models\Cantidad;
use App\Models\Contrato;
use Illuminate\COntracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SaldoContratosExport implements FromView, ShouldAutoSize
{
    protected $contrato;

    public function __construct($contrato)
    {
        $this->contrato = $contrato;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('movimientos.export_saldos', [
            'saldos' => Movimientos::all(),
        ]);
    }
}
