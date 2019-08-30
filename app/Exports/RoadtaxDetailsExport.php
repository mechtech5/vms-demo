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
    	$comp = RoadtaxDetails::join('vch_mast', 'vch_mast.id', '=', 'doc_roadtax_det.vch_id')->where('doc_roadtax_det.fleet_code',$fleet_code);
    	
        return $comp;
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->roadtax_no,$comp->roadtax_amt,$comp->payment_mode,$comp->pay_no,$comp->pay_dt,$comp->pay_bank,$comp->pay_branch,$comp->valid_from,$comp->valid_till];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Roadtax Number','Roadtax Amount ','Payment Mode','Pay Number','Pay Date','Pay Bank','Pay Branch','Valid From','Valid Till'];
    }
}
