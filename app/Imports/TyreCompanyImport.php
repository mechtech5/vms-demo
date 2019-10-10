<?php

namespace App\Imports;

use App\Models\TyreCompany;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth;

class TyreCompanyImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['tyre_company_name']))                
            {   TyreCompany::create(['fleet_code'  => $row['fleet_code'],
                                     'comp_name'   => $row['tyre_company_name'],
                                     'created_by'  => Auth::user()->id
                                   ]);                   

            }
        }
        
         return $error;
    }
}
