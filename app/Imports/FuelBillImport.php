<?php

namespace App\Imports;

use App\FuelBill;
use Maatwebsite\Excel\Concerns\ToModel;

class FuelBillImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FuelBill([
            //
        ]);
    }
}
