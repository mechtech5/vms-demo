<?php

namespace App\Exports;

use App\vch_comp;
use App\master_state;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;


class VehicleExport implements FromQuery,WithMapping,WithHeadings
{
    public function query()
    {
    	$fleet_code = session('fleet_code');
        $comp = vch_comp::where('fleet_code',$fleet_code);
        return $comp;
    }

    public function map($comp): array
    {
    	return [ $comp->comp_name,$comp->comp_desc];
    }

    public function headings(): array
    {
        return ['Name','Description'];
    }
}
