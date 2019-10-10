<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Models\FuelEntry;
use App\Http\Controllers\Controller;
use App\Exports\FuelEntryExport;
use App\Imports\FuelEntryImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\PetrolPump;
use App\vehicle_master;
use App\Driver;
use Auth;

class FuelEntryController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $fuel  = FuelEntry::where('fleet_code',$fleet_code)->get();
        return view('fuel.fuel_entry.show',compact('fuel'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $pump       = PetrolPump::where('fleet_code',$fleet_code)->get();
        $driver     = Driver::where('fleet_code',$fleet_code)->get();
        return view('fuel.fuel_entry.create',compact('vehicle','pump','driver'));
    }

    public function store(Request $request)
    {
       $data = $request->validate([ "vch_id" => "required",
                                  "fuel_stn_id" => "required",
                                  "payment_mode" => "required|not_in:0",
                                  "date" => "required",
                                  "bill_no" => "nullable",
                                  "opening_km" => "nullable",
                                  "current_km" => "nullable",
                                  "km_covered" => "nullable",
                                  "current_diesel_filled" => "nullable",
                                  "fuel_type" => "required|not_in:0",
                                  "fuel_rate" => "required",
                                  "total_fuel_amt" => "required",
                                  "driver_id" => "required",
                                  "fuel_consumed" => "nullable",
                                  "avg_obtained" => "nullable",
                                  "last_filling_avg" => "nullable",
                                  "note" => "nullable"
                                 ]); 
       $data['fleet_code'] = session('fleet_code');
       $data['created_by'] = Auth::user()->id;
       FuelEntry::create($data);
       return redirect('fuelentry');
   }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $pump       = PetrolPump::where('fleet_code',$fleet_code)->get();
        $driver     = Driver::where('fleet_code',$fleet_code)->get();
        $data       = FuelEntry::find($id);
        return view('fuel.fuel_entry.edit',compact('vehicle','pump','driver','data'));
    }

    public function update(Request $request, $id)
    {
         $data = $request->validate([ "vch_id" => "required",
                                  "fuel_stn_id" => "required",
                                  "payment_mode" => "required|not_in:0",
                                  "date" => "required",
                                  "bill_no" => "nullable",
                                  "opening_km" => "nullable",
                                  "current_km" => "nullable",
                                  "km_covered" => "nullable",
                                  "current_diesel_filled" => "nullable",
                                  "fuel_type" => "required|not_in:0",
                                  "fuel_rate" => "required",
                                  "total_fuel_amt" => "required",
                                  "driver_id" => "required",
                                  "fuel_consumed" => "nullable",
                                  "avg_obtained" => "nullable",
                                  "last_filling_avg" => "nullable",
                                  "note" => "nullable"
                                 ]); 
       $data['fleet_code'] = session('fleet_code');
       $data['created_by'] = Auth::user()->id;
       FuelEntry::where('id',$id)->update($data);
       return redirect('fuelentry');
    }

    public function destroy($id)
    {
        FuelEntry::where('id',$id)->delete();
        return redirect('fuelentry');
    }

     public function export() 
    {
        return Excel::download(new FuelEntryExport, 'FuelEntry.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FuelEntryImport,request()->file('file'));
        
        return redirect('fuelentry');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_FuelEntry.xlsx');
    return response()->download($file_path);
    }
}
