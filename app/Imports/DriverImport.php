<?php

namespace App\Imports;

use App\Driver;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\master_state;
use App\City;
use DateTime;
use Carbon\Carbon;
use Auth;

class DriverImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {        
        $error = array();
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
          
            $row['fleet_code'] =  $fleet_code;

            if(!empty($row['name']) && !empty($row['license_no']) && !empty($row['address']) && !empty($row['phone']))
            {       
               Driver::create([
                'fleet_code' => $row['fleet_code'],
                'name'       => $row['name'],
                'address'    => $row['address'],
                'salary'     => $row['salary'],
                'license_no' => $row['license_no'],
                'phone'      => $row['phone'],
                'created_by' => Auth::user()->id
                ]); 
                
            }
        }
    }
    
}
