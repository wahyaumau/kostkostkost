<?php

namespace App\Exports;

use App\Models\Boardinghouse;
use Maatwebsite\Excel\Concerns\FromCollection;

class BoardinghouseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Boardinghouse::all();
    }
}
