<?php

namespace App\Exports;

use App\FuelBill;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuelBillExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FuelBill::all();
    }
}
