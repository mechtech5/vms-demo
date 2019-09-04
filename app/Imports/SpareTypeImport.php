<?php

namespace App\Imports;

use App\SpareType;
use Maatwebsite\Excel\Concerns\ToModel;

class SpareTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SpareType([
            //
        ]);
    }
}
