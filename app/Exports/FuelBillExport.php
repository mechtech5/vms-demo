<?php

namespace App\Exports;

use App\Models\FuelBill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
use App\Models\PetrolPump;
class FuelBillExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = FuelBill::join('fuel_station_mast', 'fuel_station_mast.id', '=', 'fuel_bill_payments.fuel_stn_id')->where('fuel_bill_payments.fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->pump_name,$comp->date,$comp->payment_mode,$comp->total_amt_paid,$comp->current_diesel_filled,$comp->total_fuel_amt,$comp->avg_obtained];
    }

    public function headings(): array
    {
        return ['Pump Name','Date','Payment Mode','Total Paid Amount'];
    }
}
