<?php

namespace App\Http\Controllers\Fueltank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Exports\FueltankExport;
use App\Imports\FueltankImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Fueltank;
use Session;
use Auth;
class FueltankController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $fueltank = Fueltank::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.fueltank.show',compact('fueltank'));
    }

   
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.fueltank.create',compact('vehicle') );
    }

    public function store(Request $request)
    {
        $data =$request->validate([
                                  "vch_id" => "required",
                                  "km_reading" => 'required|numeric',
                                  "cost" => 'required|numeric',
                                  'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                 ]);
        $data['remarks']    = $request->remarks;
        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        Fueltank::create($data);
        return redirect('fueltank');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        $data = Fueltank::find($id);
        return view('service_maintenace.fueltank.edit',compact('vehicle','data') );
    }

    
    public function update(Request $request, $id)
    {
         $data =$request->validate([
                                  "vch_id" => "required",
                                  "km_reading" => 'required|numeric',
                                  "cost" => 'required|numeric',
                                  'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                 ]);
        $data['remarks']   = $request->remarks;
        $data['fleet_code']= session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        Fueltank::where('id',$id)->update($data);
        return redirect('fueltank');
    }

   
    public function destroy($id)
    {
        Fueltank::where('id',$id)->delete();
        return redirect('fueltank');
    }

    public function export() 
    {
        return Excel::download(new FueltankExport, 'Fueltank.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FueltankImport,request()->file('file'));
        
        return redirect('fueltank');
    }
}
