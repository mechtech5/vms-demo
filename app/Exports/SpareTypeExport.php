<?php

namespace App\Exports;

use App\SpareType;
use Maatwebsite\Excel\Concerns\FromCollection;

class SpareTypeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SpareType::all();
    }
}
