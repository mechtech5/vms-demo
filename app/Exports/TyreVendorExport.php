<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\TyreVendor;
use Session;
class TyreVendorExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = TyreVendor::join('master_cities', 'master_cities.id', '=', 'tyre_vendor_mast.city_id')->join('master_states', 'master_states.id', '=', 'tyre_vendor_mast.state_id')->where('tyre_vendor_mast.fleet_code',$fleet_code);
 
    	 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->name,$comp->mobile,$comp->phone,$comp->contact_person_name,$comp->contact_person_phone,$comp->gst,$comp->state_name,$comp->city_name,$comp->vendor_type,$comp->email];
    }

    public function headings(): array
    {
        return ['Name','Mobile Number','Phone Number','Person Name','Person Contact','GST NO.','State Name','City Name','Supplier Type','Email'];
    }
}
