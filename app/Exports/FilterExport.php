<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
use DB;

class FilterExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = DB::table('srv_filter_replacement')->orderBy('srv_filter_replacement.id')->join('vch_mast', 'vch_mast.id', '=', 'srv_filter_replacement.vch_id')->where('srv_filter_replacement.fleet_code',$fleet_code);
    	
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->filter_type,$comp->filter_comp,$comp->km_reading,$comp->cost];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','Filter Type','Filter Company','KM Reading','Cost'];
    }
}
