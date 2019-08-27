<?php

namespace App\Exports;

use App\Models\OilChange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class OilExport implements  FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = OilChange::join('vch_mast', 'vch_mast.id', '=', 'srv_oil_cleaning_job.vch_id')->where('srv_oil_cleaning_job.fleet_code',$fleet_code);
    	
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->km_reading,$comp->cost];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','KM Reading','Cost'];
    }
}
