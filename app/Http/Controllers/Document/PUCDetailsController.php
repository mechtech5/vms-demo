<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Exports\FueltankExport;
use App\Imports\FueltankImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PUCDetails;
use Session;
use File;

class PUCDetailsController extends Controller
{
   
    public function index()
    {
        $fleet_code  = session('fleet_code');
        $pucDetails = PUCDetails::where('fleet_code',$fleet_code)->get();
        return view('document.puc_details.show',compact('pucDetails'));
    }

    public function create()
    {
        $fleet_code  = session('fleet_code');
        $vehicle     = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('document.puc_details.create',compact('vehicle'));
    }

  
    public function store(Request $request)
    {  
        $data = $request->validate([ 'vch_id'       => 'required',
                                     'agent_id'     => 'required',   
                                     "puc_amt"     => 'required|numeric',
                                     "valid_from"  => 'required',
                                     "valid_till"  => 'required',
                                     "update_dt"   => 'required',
                                     "payment_mode"=> 'required|not_in:0',
                                     'puc_no'      => 'required',
                                      'doc_file'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');

        PUCDetails::create($vdata);
        return redirect('pucdetails');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $data       = PUCDetails::where('id',$id)->first();
        return view('document.puc_details.edit',compact('vehicle','data'));
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
        return Excel::download(new FueltankExport, 'Fueltank.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FueltankImport,request()->file('file'));
        
        return redirect('fueltank');
    }

     public function download() {
        $file_path = public_path('demo_files/Demo_VehicleModelFormat.xlsx');
        return response()->download($file_path);
    }

    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('image')) {
        
            $filename = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $request->name.'_'.$filename.'.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Document');
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('image')->storeAs('public/'.$fleet_code.'/Document/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(!empty($id)){
          $old_data = DB::table('driver_mast')->where('id',$id)->first();
            if($request->image == null) {
                $vdata['doc_file'] = $old_data->image;    
            }
       }
    
        return $vdata;
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
