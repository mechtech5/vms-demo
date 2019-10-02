<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\vch_comp;

class VehicleImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
           if(!empty($row['name']))                
            {   
            	vch_comp::create(['fleet_code'    => session('fleet_code'),
                                     'comp_name'  => ucfirst($row['name']),
                                     'comp_desc'  => $row['description']
                                    ]);               

            }
        }
    }
}
