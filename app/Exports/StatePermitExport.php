<?php

namespace App\Exports;

use App\Models\StatePermit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class StatePermitExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = StatePermit::with('vehicle','agent','state')->where('doc_statepermit.fleet_code',$fleet_code);
        return $comp;
    }

    public function map($comp): array
    {
    	return [
            $comp->fleet_code,
            $comp->vehicle->vch_no,
            $comp->agent == null ? '' : $comp->agent->agent_name,
            $comp->permit_no,
            $comp->permit_amt,
            $comp->all_india_permit == 1 ? 'YES' : 'NO',
            $comp->state  == null ? '' : $comp->state->state_name,
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
            'Permit Number',
            'Permit Amount',
            'All India Permit',
            'State',
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
            'Cubic Capacity'];
    }
}
