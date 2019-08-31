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
    	$comp = StatePermit::join('vch_mast', 'vch_mast.id', '=', 'doc_statepermit.vch_id')->join('master_states','master_states.id', '=','doc_statepermit.state_id')->where('doc_statepermit.fleet_code',$fleet_code);
        return $comp;
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->permit_no,$comp->permit_amt,$comp->state_name,$comp->draft_no,$comp->payment_mode,$comp->draft_date,$comp->pay_no,$comp->pay_dt,$comp->pay_bank,$comp->pay_branch,$comp->valid_from,$comp->valid_till];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Permit Number','Permit Amount','State','Draft Number','Payment Mode',
        'Draft Date','Pay Number','Pay Date','Pay Bank','Pay Branch','Valid From','Valid Till'];
    }
}
