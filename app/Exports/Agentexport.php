<?php

namespace App\Exports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Session;

class Agentexport implements FromQuery,WithMapping,WithHeadings
{
    public function query()
    {
    	$fleet_code = session('fleet_code');
        return Agent::where('fleet_code',$fleet_code);                
    }

    public function map($agent): array
    {
    	return [ $agent->agent_name,$agent->agent_phone,$agent->agent_email,$agent->agent_code];
    }

    public function headings(): array
    {
        return ['Agent Name','Agent Phone','Agent Email','Agent Code'];
    }
}
