<?php

namespace App\Exports;

use App\Models\InsuranceCompany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
class InsurancExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = InsuranceCompany::where('fleet_code',$fleet_code);
    	
        return $comp;
    }

    public function map($comp): array
    {
    	return [ $comp->comp_name,$comp->comp_phone,$comp->comp_email ];
    }

    public function headings(): array
    {
        return ['Company Name','Company Phone','Company Email'];
    }
}
