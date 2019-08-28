<?php

namespace App\Http\Controllers\BatteryCharge;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BatteryCharge;
use App\vehicle_master;
use Session;
use App\Exports\BatteryExport;
use App\Imports\BatteryImport;
use Maatwebsite\Excel\Facades\Excel;

class BatteryController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $battery = BatteryCharge::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.batterycharge.show',compact('battery'));
    }
    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.batterycharge.create',compact('vehicle'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([ "vch_id"     => 'required|not in:0',
                                     "km_reading" => 'required|numeric',
                                     "spec_grav" => 'required',
                                      "volt_reading" => 'required|numeric',
                                      "batt_water" => 'required',
                                      "batt_acid" => 'required',
                                      "chr_by" => 'required|alpha',
                                      "batt_cond" => 'required|alpha',
                                      "cost" => 'required|numeric',
                                       'date'  =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
        $data['remarks']    = $request->remarks;
        $data['fleet_code'] = session('fleet_code');
        BatteryCharge::create($data);
        return redirect('batterycharge');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();

        $data  = BatteryCharge::find($id);
        return view('service_maintenace.batterycharge.edit',compact('data','vehicle'));
    }

    
    public function update(Request $request, $id)
    {
       $data = $request->validate([ "vch_id"     => 'required',
                                     "km_reading" => 'required|numeric',
                                     "spec_grav" => 'required',
                                      "volt_reading" => 'required|numeric',
                                      "batt_water" => 'required',
                                      "batt_acid" => 'required',
                                      "chr_by" => 'required|alpha',
                                      "batt_cond" => 'required|alpha',
                                      "cost" => 'required|numeric',
                                       'date'  =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
        $data['remarks']    = $request->remarks;
        $data['fleet_code'] = session('fleet_code');
        BatteryCharge::where('id',$id)->update($data);
        return redirect('batterycharge');
    }

   
    public function destroy($id)
    {
        BatteryCharge::where('id',$id)->delete();
        return redirect('batterycharge');
    }

    public function export() 
    {
        return Excel::download(new BatteryExport, 'BatteryCharge.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new BatteryImport,request()->file('file'));
        
        return redirect('batterycharge');
    }
}
