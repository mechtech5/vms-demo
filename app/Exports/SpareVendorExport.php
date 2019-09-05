<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\SpareVendor;
use Session;

class SpareVendorExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = SpareVendor::join('master_cities', 'master_cities.id', '=', 'spare_vendor_mast.city_id')->join('master_states', 'master_states.id', '=', 'spare_vendor_mast.state_id')->where('spare_vendor_mast.fleet_code',$fleet_code);
 
    	 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->name,$comp->mobile,$comp->phone,$comp->contact_person_name,$comp->state_name,$comp->city_name];
    }

    public function headings(): array
    {
        return ['Name','Mobile Number','Phone Number','Person Name','State Name','City Name'];
    }
}
