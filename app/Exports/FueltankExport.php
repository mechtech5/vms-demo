<?php

namespace App\Exports;

use App\Models\Fueltank;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
use DB;

class FueltankExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = Fueltank::join('vch_mast', 'vch_mast.id', '=', 'srv_fuel_tank_cleaning.vch_id')->where('srv_fuel_tank_cleaning.fleet_code',$fleet_code);
    	
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
