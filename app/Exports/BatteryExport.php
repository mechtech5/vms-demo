<?php

namespace App\Exports;

use App\Models\BatteryCharge;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class BatteryExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    
    public function query()
    {
    	$fleet_code = session('fleet_code');
        return BatteryCharge::join('vch_mast', 'vch_mast.id', '=', 'srv_battery_charging.vch_id')->where('srv_battery_charging.fleet_code',$fleet_code);
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->spec_grav,$comp->volt_reading,$comp->batt_water,$comp->batt_acid,$comp->chr_by,$comp->batt_cond,$comp->cost,$comp->km_reading];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','Specific Gravity','Volt Reading','Battery Water','Battery Acid','Charging By','Battery Condition','Cost','KM Reading'];
    }
}
