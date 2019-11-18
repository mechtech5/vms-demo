<?php

namespace App\Exports;

use App\Models\InsuranceDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
class InsuranceDetailsExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = InsuranceDetails::with('vehicle','agent','insurance_company')->where('doc_insurance_det.fleet_code',$fleet_code);
    	
        return $comp;
    }

    public function map($comp): array
    {
    	return [ 
            $comp->fleet_code,
            $comp->vehicle->vch_no,
            $comp->agent == null ? '' : $comp->agent->agent_name,
            $comp->insurance_company->comp_name,
            $comp->ins_type,
            $comp->ins_policy_no,
            $comp->ins_amt,
            $comp->ins_total_amt,
            $comp->ins_pre_policy_no,
            $comp->insured_name,
            $comp->ncb_discount,
            $comp->hypothecation_agreement,
            $comp->payment_mode,
            $comp->pay_no,
            $comp->pay_dt,
            $comp->pay_bank,
            $comp->pay_branch,
            $comp->valid_from,
            $comp->valid_till,
            $comp->engine_no,
            $comp->chassis_no,
            $comp->manufacture_year,
            $comp->type_of_body,
            $comp->type_of_fuel,
            $comp->seating_capacity,
            $comp->cubic_capacit];
    }

    public function headings(): array
    {
        return [
            'Fleet Code',
            'Vehicle Number',
            'Agent Name',
            'Insurance Company',
            'Insurance Type',
            'Insurance Policy Number',
            'Insurance Amount',
            'Insurance Total Amount',
            'Insurance Pre Policy Number',
            'Insured Name',
            'NCV Discount',
            'Hypothecation Agreement',
            'Payment Mode',
            'Pay Number',
            'Pay Date',
            'Pay Bank',
            'Pay Branch',
            'Valid From',
            'Valid Till',
            'Engine No',
            'Chassis No',
            'Manufacture Year',
            'Type Of Body',
            'Type Of Fuel',
            'Seating Capacity(including Driver)',
            'Cubic Capacity'
        ];
    }
}
