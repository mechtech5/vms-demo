<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\vch_comp;
use Session;
use App\Exports\VehicleModelExport;
use App\Imports\VehicleModelImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\vch_model;

class VehiclemodelController extends Controller
{
    public function index()
    {
         $fleet_code = session('fleet_code');
        $model = vch_model::where('fleet_code',$fleet_code)->get();
        return view('vehicle_model.show',compact('model'));
    }

    public function create()
    {
         $fleet_code = session('fleet_code');
        $company  = vch_comp::where('fleet_code',$fleet_code)->get();
        
        return view('vehicle_model.create',compact('company'));
    }

    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $request->validate(['vehicle_company' => 'required|not_in:0',
                             'model_name'     => 'required'
                            ]);
    
        $vdata['vcompany_code'] = $request->vehicle_company;
        $vdata['model_name']    = $request->model_name;
        $vdata['model_desc']    = $request->model_desc;
        $vdata['fleet_code']    = $fleet_code;
        $vdata['created_by']    = Auth::user()->id;
    
        vch_model::create($vdata);
        return redirect('vehicleModel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company  = vch_comp::all();
        $model    =  vch_model::where('id',$id)->get();
        return view('vehicle_model.edit',compact('model','company'));
    }

    public function update(Request $request, $id)
    {
         $request->validate(['vehicle_company' => 'required|not_in:0',
                             'model_name'     => 'required'
                            ]);
    
        $vdata['vcompany_code'] = $request->vehicle_company;
        $vdata['model_name']    = $request->model_name;
        $vdata['model_desc']    = $request->model_desc;
        $vdata['created_by']    = Auth::user()->id;
    
        vch_model::where('id',$id)->update($vdata);
        return redirect('vehicleModel');
    }

    public function destroy($id)
    {
        vch_model::where('id',$id)->delete();
         return redirect('vehicleModel');
    }

     public function export() 
    {
        return Excel::download(new VehicleModelExport, 'vehiclemodel.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new VehicleModelImport,request()->file('file'));
        
        return redirect('vehicleModel');
    }

     public function download() {
        $file_path = public_path('demo_files/Demo_VehicleModelFormat.xlsx');
    return response()->download($file_path);
    }
}
