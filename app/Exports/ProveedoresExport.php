<?php

namespace App\Exports;

use App\Models\Proveedor;
use Illuminate\COntracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ProveedoresExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('proveedor.export', [
            'proveedores' => Proveedor::all(),
        ]);
    }
}
