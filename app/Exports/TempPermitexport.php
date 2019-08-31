<?php

namespace App\Exports;

use App\TempPermit;
use Maatwebsite\Excel\Concerns\FromCollection;

class TempPermitexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TempPermit::all();
    }
}
