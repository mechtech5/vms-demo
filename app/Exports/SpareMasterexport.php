<?php

namespace App\Exports;

use App\SpareMaster;
use Maatwebsite\Excel\Concerns\FromCollection;

class SpareMasterexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SpareMaster::all();
    }
}
