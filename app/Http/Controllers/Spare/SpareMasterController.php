<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\SpareMasterexport;
use App\Imports\SpareMasterImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SpareMaster;
use App\Models\SpareCompany;
use App\Models\SpareType;
use App\Models\SpareUnit;
use App\Models\SpareVendor;
use App\Models\SpareSuppliers;

class SpareMasterController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $spares = SpareMaster::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_master.show',compact('spares'));
    }
    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $comapny   = SpareCompany::where('fleet_code',$fleet_code)->get();
        $type      = SpareType::where('fleet_code',$fleet_code)->get();
        $unit      = SpareUnit::where('fleet_code',$fleet_code)->get();

        return view('spare.spare_master.create',compact('comapny','type','unit'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate(["comp_id" => "required|not_in:0",
                                    "type_id" => "required|not_in:0",
                                    "unit_id" => "required|not_in:0",
                                    "name" => "required|alpha",
                                    "stk_open" => "required|numeric",
                                    "stk_curr" => "required|numeric",
                                    "stk_buffer" => "nullable",
                                    "rate" => "nullable|numeric",
                                    "gst" => "nullable|numeric",
                                    "stk_value" => "nullable|numeric",
                                    "part_no" => "nullable|numeric",
                                    "sales_prc" => "nullable|numeric"
                                ]);
        $data['fleet_code'] = session('fleet_code');
        SpareMaster::create($data);
        return redirect('sparemaster');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $comapny   = SpareCompany::where('fleet_code',$fleet_code)->get();
        $type      = SpareType::where('fleet_code',$fleet_code)->get();
        $unit      = SpareUnit::where('fleet_code',$fleet_code)->get();
        $data      = SpareMaster::find($id);
        $spares    = array();
        $vendor    = SpareVendor::where('fleet_code',$fleet_code)->get();
        $suppliers = SpareSuppliers::where('fleet_code',$fleet_code)->where('spare_id',$id)->get();

        return view('spare.spare_master.edit',compact('comapny','type','unit','data','spares','vendor','suppliers'));
    }

    
    public function update(Request $request, $id)
    {
         $data = $request->validate(["comp_id" => "required|not_in:0",
                                    "type_id" => "required|not_in:0",
                                    "unit_id" => "required|not_in:0",
                                    "name" => "required|alpha",
                                    "stk_open" => "required|numeric",
                                    "stk_curr" => "required|numeric",
                                    "stk_buffer" => "nullable",
                                    "rate" => "nullable|numeric",
                                    "gst" => "nullable|numeric",
                                    "stk_value" => "nullable|numeric",
                                    "part_no" => "nullable|numeric",
                                    "sales_prc" => "nullable|numeric"
                                ]);
        $data['fleet_code'] = session('fleet_code');
        SpareMaster::where('id',$id)->update($data);
        return redirect('sparemaster');
    }

    public function destroy($id)
    {
        SpareMaster::where('id',$id)->delete();
        return redirect('sparemaster');   
    }

    public function export() 
    {
        return Excel::download(new SpareMasterexport, 'SpareMaster.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareMasterImport,request()->file('file'));
        
        return redirect('sparemaster');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareMaster.xlsx');
       return response()->download($file_path);
    }

    public function suppliers(Request $request){
        $fleet_code = session('fleet_code');
        $data['rate']          = $request->rate;
        $data['vendor_id']     = $request->vendor_id;
        $data['spare_comp_id'] = $request->comp_id;
        $data['spare_id']      = $request->spare_id;
        $data['fleet_code']    = $fleet_code;
        SpareSuppliers::create($data);
        $suppliers = SpareSuppliers::where('fleet_code',$fleet_code)->where('spare_id',$request->spare_id)->get();
        return view('spare.spare_master.refresh_table',compact('suppliers'));
    }
}
