<?php

namespace App\Exports;

use App\Models\Mou;
use Maatwebsite\Excel\Concerns\FromCollection;

class MouExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mou::all();
    }
}
