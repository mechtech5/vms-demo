<?php

namespace App\Exports;

use App\Models\PetrolPump;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class PetrolPumpExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = PetrolPump::join('master_states', 'master_states.id', '=', 'fuel_station_mast.pump_state')->join('master_cities','master_cities.state_id', '=', 'master_states.id')->where('fuel_station_mast.fleet_code',$fleet_code);

        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->pump_name,$comp->pump_phone,$comp->pump_gst_no,$comp->state_name,$comp->city_name];
    }

    public function headings(): array
    {
        return ['Petrol Pump name','Petrol Pump Phone','Petrol Pump GST','Petrol Pump State','Petrol Pump City'];
    }
}
