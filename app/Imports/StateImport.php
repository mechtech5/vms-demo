<?php

namespace App\Imports;

use App\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth;

class StateImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['state_name']) && !empty($row['state_code']) )                
            {   State::create(['fleet_code'  => $row['fleet_code'],
                                'state_code' => strtoupper($row['state_code']),
                                'state_name' => ucfirst($row['state_name']),
                                'created_by' => Auth::user()->id
                                ]);                 

            }
        }
        
         return $error;
    }
}
