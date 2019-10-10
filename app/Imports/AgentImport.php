<?php

namespace App\Imports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use Auth;

class AgentImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['agent_name']) && !empty($row['agent_code']) && !empty($row['agent_phone']))      
            {   
                $email = $row['agent_email'] ? $row['agent_email'] :'';
                Agent::create(['fleet_code'   => $row['fleet_code'],
                                'agent_name'  => $row['agent_name'],
                                'agent_code'  => $row['agent_code'],
                                'agent_phone' => $row['agent_phone'],
                                'agent_email' => $email,
                                'created_by'  => Auth::user()->id
                                ]);                   
               
            }
        }        
         return $error;
    }
}
