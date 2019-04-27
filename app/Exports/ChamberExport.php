<?php

namespace App\Exports;

use App\Models\Chamber;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChamberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Chamber::all();
    }
}
