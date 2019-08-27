<?php

namespace App\Http\Controllers\filter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\vehicle_master;
use App\Exports\FilterExport;
use App\Imports\FilterImport;
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $filter = DB::table('srv_filter_replacement')->where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.filter.show',compact('filter'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = DB::table('vch_mast')->where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.filter.create',compact('vehicle'));
    }

    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $validatedData = $request->validate([
                                        'vch_id'=>'required|not_in:0',
                                       'km_reading'=> 'required',
                                       'filter_comp' => 'required',
                                       'filter_type'=>'required',
                                       'cost'       =>'required',
                                       'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
     
        $validatedData['fleet_code'] = $fleet_code;
        $validatedData['remarks']    = $request['remarks'];
        DB::table('srv_filter_replacement')->insert($validatedData);
        return redirect('filter');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = DB::table('vch_mast')->where('fleet_code',$fleet_code)->get();
        $data = DB::table('srv_filter_replacement')->where('id',$id)->first();
        
        return view('service_maintenace.filter.edit',compact('data','vehicle'));
    }

   
    public function update(Request $request, $id)
    {
        $fleet_code = session('fleet_code');
        $validatedData = $request->validate([
                                        'vch_id'=>'required|not_in:0',
                                       'km_reading'=> 'required',
                                       'filter_comp' => 'required',
                                       'filter_type'=>'required',
                                       'cost'       =>'required',
                                       'date'       =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
     
        $validatedData['fleet_code'] = $fleet_code;
        $validatedData['remarks']    = $request['remarks'];
        DB::table('srv_filter_replacement')->where('id',$id)->update($validatedData);
        return redirect('filter');
    }

    
    public function destroy($id)
    {
        DB::table('srv_filter_replacement')->where('id',$id)->delete();
        return redirect('filter');
    }

     public function export() 
    {
        return Excel::download(new FilterExport, 'Filter.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FilterImport,request()->file('file'));
        
        return redirect('filter');
    }
}
