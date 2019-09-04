<?php

namespace App\Exports;

use App\Models\SpareCompany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class SpareCompanyExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = SpareCompany::where('fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->comp_name];
    }

    public function headings(): array
    {
        return ['Spare Company Name'];
    }
}
