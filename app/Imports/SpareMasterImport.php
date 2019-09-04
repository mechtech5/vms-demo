<?php

namespace App\Imports;

use App\SpareMaster;
use Maatwebsite\Excel\Concerns\ToModel;

class SpareMasterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SpareMaster([
            //
        ]);
    }
}
