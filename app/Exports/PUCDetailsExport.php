<?php

namespace App\Exports;

use App\Models\PUCDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class PUCDetailsExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = PUCDetails::with('vehicle','agent')->where('doc_puc_det.fleet_code',$fleet_code);
        return $comp;   
    }

    public function map($comp): array
    {
        
    	return [ $comp->fleet_code,
            $comp->vehicle->vch_no,
            $comp->agent == null ? '' : $comp->agent->agent_name,
            $comp->puc_no,$comp->puc_amt,$comp->payment_mode,$comp->pay_no,$comp->pay_dt,$comp->pay_bank,$comp->pay_branch,$comp->valid_from,$comp->valid_till,$comp->engine_no,$comp->chassis_no,$comp->manufacture_year,$comp->type_of_body,$comp->type_of_fuel,$comp->seating_capacity,$comp->cubic_capacity];
    }

    public function headings(): array
    {
        return ['Fleet Code','Vehicle Number','Agent Name','PUC Number','Amount ','Payment Mode','Pay Number','Pay Date','Pay Bank','Pay Branch','Valid From','Valid Till','Engine No','Chassis No','Manufacture Year','Type Of Body','Type Of Fuel','Seating Capacity','Cubic Capacity'];
    }
}
