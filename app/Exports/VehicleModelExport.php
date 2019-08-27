<?php

namespace App\Exports;

use App\vch_model;
use App\vch_comp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class VehicleModelExport implements  FromQuery,WithMapping,WithHeadings
{
	use Exportable;

   public function query()
    {
    	$fleet_code = session('fleet_code');
    	$comp = vch_comp::join('vch_model','vch_comps.id','=', 'vch_model.vcompany_code')->where('vch_model.fleet_code',$fleet_code);
    	
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->model_name,$comp->comp_name,$comp->comp_desc];
    }

    public function headings(): array
    {
        return ['Model Name','Company Name','Description'];
    }
}
