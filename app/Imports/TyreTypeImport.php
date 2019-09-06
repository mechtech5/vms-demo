<?php

namespace App\Imports;

use App\Models\TyreType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class TyreTypeImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['tyre_type_name']))                
            {   TyreType::create(['fleet_code'  => $row['fleet_code'],
                                  'type_name' => $row['tyre_type_name']
                                ]);                   

            }
        }
        
         return $error;
    }
}
