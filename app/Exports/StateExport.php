<?php

namespace App\Exports;

use App\State;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class StateExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = State::where('fleet_code',$fleet_code); 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->state_name,$comp->state_code];
    }

    public function headings(): array
    {
        return ['State Name','State Code'];
    }
}
