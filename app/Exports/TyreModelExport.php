<?php

namespace App\Exports;

use App\TyreModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class TyreModelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TyreModel::all();
    }
}
