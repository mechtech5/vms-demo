<?php

namespace App\Exports;

use App\Models\KMupdate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class KMupdateExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = KMupdate::join('vch_mast', 'vch_mast.id', '=', 'vch_km_readings.vch_id')->where('vch_km_readings.fleet_code',$fleet_code);
    	
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->reading];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','Kilometer Reading'];
    }
}


