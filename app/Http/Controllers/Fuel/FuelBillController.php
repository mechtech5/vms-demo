<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\FuelBillExport;
use App\Imports\FuelBillImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\FuelBill;
use App\Models\PetrolPump;

class FuelBillController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $fuelbill = FuelBill::where('fleet_code',$fleet_code)->get();
        return view('fuel.fuelbill.show',compact('fuelbill'));
    }

   
    public function create()
    {
        $fleet_code = session('fleet_code');
        $pump = PetrolPump::where('fleet_code',$fleet_code)->get();
        return view('fuel.fuelbill.create',compact('pump'));
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([  "fuel_stn_id" => "required|not_in:0",
                                      "date" => "required",
                                      "total_amt_paid" => "required",
                                      "payment_mode" => "required|not_in:0"]);
        $data['remarks'] = $request->remarks;
        $data = $this->pay_validate($request,$data);
        FuelBill::create($data);
        return redirect('fuelbill');   
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $pump = PetrolPump::where('fleet_code',$fleet_code)->get();
        $data = FuelBill::find($id);
        return view('fuel.fuelbill.edit',compact('pump','data'));
    }

  
    public function update(Request $request, $id)
    {
        
        $data = $request->validate([  "fuel_stn_id" => "required|not_in:0",
                                      "date" => "required",
                                      "total_amt_paid" => "required",
                                      "payment_mode" => "required|not_in:0"]);
        $data['remarks'] = $request->remarks;
        $data = $this->pay_validate($request,$data);
        FuelBill::where('id',$id)->update($data);
        return redirect('fuelbill'); 
    }

    
    public function destroy($id)
    {
       FuelBill::where('id',$id)->delete();
       return redirect('fuelbill'); 
    }

    public function export() 
    {
        return Excel::download(new FuelBillExport, 'FuelBill.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FuelBillImport,request()->file('file'));
        
        return redirect('fuelentry');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_FuelBill.xlsx');
    return response()->download($file_path);
    }

    public function pay_validate(Request $request,$data)
    {  
          if($request->payment_mode == 'cheque'){                             
           $request->validate([ "cpay_no"      => 'required|numeric',
                                         "cpay_dt"      => 'required',
                                         "cpay_bank"    => 'required|alpha',
                                         "cpay_branch"  => 'required|alpha',                                 
                                        ]);
            $Vdata['pay_no']  = $request->cpay_no;
           $Vdata['pay_dt'] = $request->cpay_dt;
           $Vdata['pay_bank'] = $request->cpay_bank;
           $Vdata['pay_branch'] = $request->cpay_branch;
            $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'dd'){
                             
           $request->validate([ "dpay_no"      => 'required|numeric',
                                         "dpay_dt"      => 'required',
                                         "dpay_bank"    => 'required|alpha',
                                         "dpay_branch"  => 'required|alpha',                                 
                                        ]);
            $Vdata['pay_no']  = $request->dpay_no;
           $Vdata['pay_dt'] = $request->dpay_dt;
           $Vdata['pay_bank'] = $request->dpay_bank;
           $Vdata['pay_branch'] = $request->dpay_branch;
            $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'rtgs'){
                             
            $request->validate([ "rpay_no"      => 'required|numeric',
                                 "rpay_dt"      => 'required',
                                 "rpay_bank"    => 'required|alpha',
                                 "rpay_branch"  => 'required|alpha',                                 
                                        ]);
           $Vdata['pay_no']  = $request->rpay_no;
           $Vdata['pay_dt'] = $request->rpay_dt;
           $Vdata['pay_bank'] = $request->rpay_bank;
           $Vdata['pay_branch'] = $request->rpay_branch;
           $data = array_merge($data, $Vdata);   
        }
        else if($request->payment_mode == 'neft'){
                             
           $request->validate([ "npay_no"      => 'required|numeric',
                                "npay_dt"      => 'required',
                                "npay_bank"    => 'required|alpha',
                                "npay_branch"  => 'required|alpha'                                 
                                        ]);
           $Vdata['pay_no']  = $request->npay_no;
           $Vdata['pay_dt'] = $request->npay_dt;
           $Vdata['pay_bank'] = $request->npay_bank;
           $Vdata['pay_branch'] = $request->npay_branch;
            $data = array_merge($data, $Vdata);   
        }
        return $data;
    }
}
