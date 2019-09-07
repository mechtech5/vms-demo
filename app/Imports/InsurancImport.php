<?php

namespace App\Imports;

use App\Models\InsuranceCompany;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class InsurancImport implements ToCollection,WithHeadingRow
{    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['company_name']) && !empty($row['company_phone']) )                
            {   InsuranceCompany::create(['fleet_code'  => $row['fleet_code'],
                                        'comp_name' => ucfirst($row['company_name']),
                                        'comp_phone' => $row['company_phone']
                                        ]);                  

            }
        }
        
         return $error;
    }
}
