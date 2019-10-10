<?php

namespace App\Imports;

use App\Models\SpareMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use App\Models\SpareType;
use App\Models\SpareCompany;
use App\Models\SpareUnit;
use Auth;

class SpareMasterImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {
         $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['name']) && !empty($row['type_name'])  && !empty($row['unit_name'])
                && !empty($row['company_name']) && !empty($row['stock_current']) && !empty($row['stock_value']))
            {                        
                $type  = SpareType::where('fleet_code',$fleet_code)->where('type_name', 'like',$row['type_name'])->first();
                $comp = SpareCompany::where('fleet_code',$fleet_code)->where('comp_name', 'like',$row['company_name'])->first();
                $unit = SpareUnit::where('fleet_code',$fleet_code)->where('unit_name', 'like',$row['unit_name'])->first();
                   
                if(!empty($type) && !empty($comp) && !empty($unit)){
                   
                        SpareMaster::create([
                        'fleet_code'  => $row['fleet_code'],
                        'name'        => $row['name'],
                        'type_id'     => $type->id,
                        'unit_id'     => $unit->id,
                        'comp_id'     => $comp->id,
                        'stk_curr'    => $row['stock_current'],
                        'stk_value'   => $row['stock_value'],
                        'stk_open'    => $row['opening_stock'],
                        'stk_buffer'  => $row['buffer_stock'],
                        'rate'        => $row['rate'],
                        'gst'         => $row['gst'],
                        'part_no'     => $row['part_no'],
                        'sales_prc'   => $row['sales_price'],
                        'created_by'  => Auth::user()->id

                        ]);
                    //}

                }
            }
        }
         return $error;
    }
}
