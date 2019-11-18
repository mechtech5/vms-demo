<?php

namespace App\Exports;

use App\Models\RoadtaxDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class RoadtaxDetailsExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = RoadtaxDetails::with('vehicle','agent')
                                ->where('doc_roadtax_det.fleet_code',$fleet_code);

        return $comp;
    }

    public function map($comp): array
    {
        // dd($comp);
    	return [ $comp->fleet_code,
            $comp->vehicle->vch_no,
            $comp->agent == null ? '' : $comp->agent->agent_name,
            $comp->roadtax_no,
            $comp->roadtax_amt,
            $comp->tax_type,
            $comp->receipt_id,
            $comp->receipt_date,
            $comp->payment_mode,
            $comp->pay_no,
            $comp->pay_dt,
            $comp->pay_bank,
            $comp->pay_branch,
            $comp->valid_from,
            $comp->expire_time != 'LIFE TIME' ? $comp->valid_till : $comp->expire_time,
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
            'Goods & Service tax Number',
            'Roadtax Amount',
            'Tax Type',
            'Receipt Id',
            'Receipt Date',
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
            'Seating Capacity',
            'Cubic Capacity'
            ];
    }
}
