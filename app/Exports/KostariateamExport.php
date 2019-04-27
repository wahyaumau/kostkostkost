<?php

namespace App\Exports;

use App\Models\Kostariateam;
use Maatwebsite\Excel\Concerns\FromCollection;

class KostariateamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kostariateam::all();
    }
}
