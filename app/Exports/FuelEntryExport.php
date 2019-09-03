<?php

namespace App\Exports;

use App\Models\FuelEntry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
use App\Models\PetrolPump;
class FuelEntryExport implements  FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = FuelEntry::join('vch_mast', 'vch_mast.id', '=', 'fuel_filled_entry.vch_id')->join('fuel_station_mast', 'fuel_filled_entry.fuel_stn_id', '=', 'fuel_station_mast.id')->where('fuel_filled_entry.fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->payment_mode,$comp->pump_name,$comp->current_diesel_filled,$comp->total_fuel_amt,$comp->avg_obtained];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','Payment Mode','Pump Name','Current Diesel Filled','Total Fuel Amount','Average/Mileage'];
    }
}
