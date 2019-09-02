<?php

namespace App\Exports;

use App\Models\TempPermit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class TempPermitexport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = TempPermit::join('vch_mast', 'vch_mast.id', '=', 'doc_temporary_permit.vch_id')->join('master_states','master_states.id', '=','doc_temporary_permit.tp_state_id')->where('doc_temporary_permit.fleet_code',$fleet_code);

        return $comp;
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->tp_permit_no,$comp->tp_tax_amt,$comp->state_name,$comp->tp_permit_start_dt,$comp->tp_permit_end_dt];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Permit Number','Tax Amount','State','Permit Start Date','Permit End Date'];
    }
}
