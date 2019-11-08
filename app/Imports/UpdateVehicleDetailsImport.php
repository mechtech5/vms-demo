<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\vch_comp;
use App\vch_model;

class UpdateVehicleDetailsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {

        	$data = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['vehicle_company'])->get();
            
        	$model = vch_model::where('fleet_code',$fleet_code)->where('model_name',$row['vehicle_model'])->get();
        	
            //for serial no(randdom no)
            $length = 12;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
    if($fleet_code == $row['fleet_code']){
       
       
            if(!empty($row['vehicle_no']) && !empty($row['vehicle_company']))                
            {   
                $comp = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', $row['vehicle_no'])->first();
                $pay_date   = Date::excelToDateTimeObject($row['manufacture_date']);
                if(!empty($comp)){
                        vehicle_master::where('fleet_code',$fleet_code)
                        				->where('id', $comp->id)
                        				->update(['fleet_code'  => $data[0]->fleet_code,
                                            'vch_no'    => $row['vehicle_no'],
                                            'vch_comp' => $data[0]->id,
                                            'vch_model' => $model[0]->id,
                                            'owner_name' => $row['owner_name'],
                                            'owner_addr' => $row['owner_address']
                                            ]);

                	  
                }else{
                	vehicle_master::create(['fleet_code'  => $data[0]->fleet_code,
                                            'vch_no'    => $row['vehicle_no'],
                                            'vch_comp' => $data[0]->id,
                                            'vch_model' => $model[0]->id,
                                            'vch_serial_no' =>$randomString,
                                            'owner_name' => $row['owner_name']
                                            ]); 
                }                

            }
        }
        }
        
         return $error;
    }
}
