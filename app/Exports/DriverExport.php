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
    	return [ $drivers->id,$drivers->name,$drivers->address,$drivers->joined_dt,$drivers->salary,$drivers->license_no, $drivers->license_exp, $drivers->phone 
        	 ];
    }

    public function headings(): array
    {
        return ['id' ,'name','address','joined_dt','salary','license_no','license_exp','phone'];
    }

}
