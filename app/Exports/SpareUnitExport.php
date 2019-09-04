<?php

namespace App\Exports;

use App\Models\SpareUnit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class SpareUnitExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = SpareUnit::where('fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->unit_name];
    }

    public function headings(): array
    {
        return ['Spare Unit Name'];
    }
}
