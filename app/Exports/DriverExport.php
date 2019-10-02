<?php

namespace App\Exports;

use App\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use DB;
use Session;

class DriverExport implements FromQuery,WithMapping,WithHeadings
{
    public function query()
    {
    	$fleet_code = session('fleet_code');
        return Driver::where('fleet_code',$fleet_code);                
    }

    public function map($drivers): array
    {
    	return [ $drivers->name,$drivers->address,$drivers->salary,$drivers->license_no,$drivers->phone 
        	 ];
    }

    public function headings(): array
    {
        return ['Name','Address','Salary','License No','Phone'];
    }

}
