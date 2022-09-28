<?php

namespace App\Exports;

use App\Models\Contrato;
use App\Models\MontoBoleta;
use Illuminate\COntracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BoletaGarantiaExport implements FromView, ShouldAutoSize
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
        $boletas = MontoBoleta::where('id_contrato_original', '=', $this->contrato->id)->orWhere('id_contrato_modificada', '=', $this->contrato->id)->get();
        return view('boletagarantia.export', [
            'boletagarantias' => $boletas,
        ]);
    }
}
