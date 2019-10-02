<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Exports\VehicleExport;
use App\Imports\VehicleImport;
use Maatwebsite\Excel\Facades\Excel;
use App\vch_comp;
use App\vch_model;

class VehicleController extends Controller
{
    
    public function index()
    {   
        $fleet_code = session('fleet_code');
        $vehicle = vch_comp::where('fleet_code',$fleet_code)->get();
        return view('vehicle.show',compact('vehicle'));
    }

    public function create()
    {
        return view('vehicle.create');
    }

    
    public function store(Request $request)
    {
        $request->validate(['vehicle_company' => 'required']);
        
        $fleet_code = session('fleet_code');
        $vdata['comp_name'] = $request->vehicle_company;
        $vdata['comp_desc'] = $request->company_description;
        $vdata['fleet_code'] = $fleet_code;
        
        vch_comp::create($vdata);
        return redirect('vehicle');
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $vehicle = vch_comp::where('id',$id)->get();
        return view('vehicle.edit',compact('vehicle'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate(['company_description' => 'required']);
    
        $vdata['comp_name'] = $request->vehicle_company;
        $vdata['comp_desc'] = $request->company_description;
    
        vch_comp::where('id',$id)->update($vdata);
        return redirect('vehicle');
    }

    public function destroy($id)
    {
        vch_comp::where('id',$id)->delete();
        vch_model::where('vcompany_code',$id)->delete();
        return redirect('vehicle');
    }

    public function export() 
    {
        return Excel::download(new VehicleExport, 'vehicle.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new VehicleImport,request()->file('file'));
        
        return redirect('vehicle');
    }

    public function download() {
        $file_path = public_path('demo_files/Demo_VehicleFormat.xlsx');
        return response()->download($file_path);
    }
}
