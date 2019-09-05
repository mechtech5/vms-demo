<?php

namespace App\Imports;

use App\TyreModel;
use Maatwebsite\Excel\Concerns\ToModel;

class TyreModelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TyreModel([
            //
        ]);
    }
}
