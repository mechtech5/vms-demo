<?php

namespace App\Imports;

use App\TempPermit;
use Maatwebsite\Excel\Concerns\ToModel;

class TempPermitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TempPermit([
            //
        ]);
    }
}
