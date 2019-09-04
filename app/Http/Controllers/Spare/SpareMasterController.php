<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\SpareCompanyExport;
use App\Imports\SpareCompanyImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SpareMaster;
use App\Models\SpareCompany;
use App\Models\SpareType;
use App\Models\SpareUnit;

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
        $data = $request->validate(["comp_id" => "required",
                                      "type_id" => "required",
                                      "unit_id" => "required",
                                      "name" => "required|alpha",
                                      "stk_open" => "required|numeric",
                                      "stk_curr" => "required|numeric",
                                      "stk_buffer" => "required",
                                      "rate" => "required",
                                      "gst" => "required",
                                      "stk_value" => "required",
                                      "part_no" => "required",
                                      "sales_prc" => "required"
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
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new SpareCompanyExport, 'SpareCompany.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareCompanyImport,request()->file('file'));
        
        return redirect('sparecompany');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareCompany.xlsx');
       return response()->download($file_path);
    }
}
