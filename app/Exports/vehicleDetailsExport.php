<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\vch_comp;
use App\vch_model;
use App\vehicle_master;

use Session;
class vehicleDetailsExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    public function query()
    {
        $fleet_code = session('fleet_code');
    	$comp = vehicle_master::join('vch_comps', 'vch_comps.id', '=', 'vch_mast.vch_comp')->join('vch_model', 'vch_model.id', '=', 'vch_mast.vch_model')->where('vch_mast.fleet_code',$fleet_code);
    	return $comp; 
    }

    public function map($comp): array
    {
    	return [ $comp->fleet_code,$comp->vch_no,$comp->comp_name,$comp->model_name,$comp->reg_km_reading,$comp->owner_name,$comp->owner_addr,$comp->owner_pan,$comp->reg_make,$comp->reg_mileage,$comp->reg_seating_capacity,$comp->reg_unladen_weight,$comp->reg_type_of_body,$comp->reg_no_tyres,$comp->reg_chassis_no,$comp->reg_engine_no,$comp->reg_manuf_year,$comp->reg_date,$comp->reg_tank_cap,$comp->chassis_color,$comp->body_color,$comp->eng_power,$comp->eng_cylinder_count,$comp->reg_invoice_no,$comp->reg_invoice_date,$comp->eng_fuel_type];
    }

    public function headings(): array
    {
        return ['Fleet Code','Vehicle No','Vehicle Company','Vehicle Model','Km. Reading','Owner Name','Owner Address','Owner Pan Card','Maker','Mileage',' Seating Capacity','Unladen Weight','Type Of Body','No Of Tyre','Chassis No','Engin No','Manufacture Date','Registration Date',' Fuel Tank Capacity','Chassis Color','Body Color','Horse Power','No Of Cylinder','Invoice No','Invoice Date','Fuel Type'];
    }
}
