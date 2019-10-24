<?php

namespace App\Http\Controllers\Oilchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\vehicle_master;
use App\Models\OilChange;
use App\Exports\OilExport;
use App\Imports\OilImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class OilChangeController extends Controller
{
    
    public function index()
    {
       $fleet_code = session('fleet_code');
       $oil = OilChange::where('fleet_code',$fleet_code)->get();

       return view('service_maintenace.oilChange.show',compact('oil'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.oilChange.create',compact('vehicle'));
    }

    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $validatedData = $request->validate([
                                        'vch_id'=>'required|not_in:0',
                                        'km_reading'=> 'required|numeric',
                                        'cost'       =>'required|numeric',
                                        'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
        $validatedData['fleet_code'] = $fleet_code;
        $validatedData['remarks']    = $request['remarks'];
        $validatedData['created_by'] = Auth::user()->id;
        OilChange::insert($validatedData);
        return redirect('oilchange');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = OilChange::find($id);
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.oilChange.edit',compact('data','vehicle'));
    }

    
    public function update(Request $request, $id)
    {
        $fleet_code = session('fleet_code');
        $validatedData = $request->validate([
                                        'vch_id'=>'required|not_in:0',
                                        'km_reading'=> 'required|numeric',
                                        'cost'       =>'required|numeric',
                                        'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
        $validatedData['fleet_code'] = $fleet_code;
        $validatedData['remarks']    = $request['remarks'];
        $validatedData['created_by'] = Auth::user()->id;
        OilChange::where('id',$id)->update($validatedData);
        return redirect('oilchange');
    }

    
    public function destroy($id)
    {
        OilChange::where('id',$id)->delete();
        return redirect('oilchange');
    }

     public function export() 
    {
        return Excel::download(new OilExport, 'Oilchange.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new OilImport,request()->file('file'));
        
        return redirect('oilchange');
    }
    public function download() {
       $file_path = public_path('demo_files/Oilchange.xlsx');
    return response()->download($file_path);
    }
}
