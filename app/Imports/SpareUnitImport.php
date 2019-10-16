<?php

namespace App\Imports;

use App\Models\SpareUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth;

class SpareUnitImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['spare_unit_name']))                
            {   SpareUnit::create(['fleet_code' => $row['fleet_code'],
                                  'unit_name'   => $row['spare_unit_name'],
                                  'created_by'  => Auth::user()->id
                                ]);                   

            }
        }
        
         return $error;
    }
}
