<?php

namespace App\Exports;

use App\Models\SpareMaster;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Session;
class SpareMasterexport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = SpareMaster::join('spare_type_mast', 'spare_type_mast.id', '=', 'spare_mast.type_id')->join('spare_comp_mast', 'spare_comp_mast.id', '=', 'spare_mast.comp_id')->join('spare_unit_mast', 'spare_unit_mast.id', '=', 'spare_mast.unit_id')->where('spare_mast.fleet_code',$fleet_code);
 
        return $comp;   
    }

    public function map($comp): array
    {
    	return [ $comp->name,$comp->type_name,$comp->unit_name,$comp->comp_name,$comp->stk_open,$comp->stk_curr,$comp->stk_value,$comp->stk_buffer,$comp->rate,$comp->gst,$comp->part_no,$comp->sales_prc];
    }

    public function headings(): array
    {
        return ['Name','Type Name','Unit Name','Company Name','Opening Stock','Stock Current','Buffer Stock','Stock Value','Rate','GST%','Part No','Sales Price'];
    }
}
