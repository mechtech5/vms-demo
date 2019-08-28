<?php

namespace App\Exports;

use App\Models\Painting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;

class PaintingExport implements  FromQuery,WithMapping,WithHeadings
{
    use Exportable;

   public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = Painting::join('vch_mast', 'vch_mast.id', '=', 'srv_painting_job.vch_id')->where('srv_painting_job.fleet_code',$fleet_code);
    	
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->vch_no,$comp->date,$comp->km_reading,$comp->cabin_color,$comp->body_colo,$comp->chasis_color,$comp->interior_color,$comp->cost];
    }

    public function headings(): array
    {
        return ['Vehicle Number','Date','KM Reading','Cabin color','Body colo','Chasis color','Interior color','Cost'];
    }
}
