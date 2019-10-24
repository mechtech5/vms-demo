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
use Auth;
use App\Models\Filter;

class FilterController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $filter = Filter::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.filter.show',compact('filter'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.filter.create',compact('vehicle'));
    }

    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $validatedData = $request->validate([
                                             'vch_id'      => 'required|not_in:0',
                                             'km_reading'  => 'required|numeric',
                                             'filter_comp' => 'required|regex:/^[\pL\s\-]+$/u',
                                             'filter_type' => 'required|regex:/^[\pL\s\-]+$/u',
                                             'cost'        => 'required|numeric',
                                             'date'        =>'required|date|date_format:Y-m-d|before:tomorrow'
                                   ]);
     
        $validatedData['fleet_code'] = $fleet_code;
        $validatedData['remarks']    = $request['remarks'];
        $validatedData['created_by'] = Auth::user()->id;
        Filter::create($validatedData);
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
        $data = Filter::where('id',$id)->first();
        
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
        $validatedData['created_by'] = Auth::user()->id;
        Filter::where('id',$id)->update($validatedData);
        return redirect('filter');
    }

    
    public function destroy($id)
    {
        Filter::where('id',$id)->delete();
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
    public function download() {
       $file_path = public_path('demo_files/Filter.xlsx');
    return response()->download($file_path);
    }
}
