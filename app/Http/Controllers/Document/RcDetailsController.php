<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_master;
use App\Exports\RCDetailsExport;
use App\Imports\PUCDetailsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RcDetails;
use Session;
use File;
use DB;
use App\Models\Agent;
use Auth;

class RcDetailsController extends Controller
{
   
    public function index()
    { 
        $fleet_code = session('fleet_code');
        $rcDetails = RcDetails::where('fleet_code',$fleet_code)->get();
        
        return view('document.rc_details.show',compact('rcDetails'));
    }

    public function create()
    { 
        $fleet_code  = session('fleet_code');
        $vehicle     = vehicle_master::where('fleet_code',$fleet_code)->get();
        $agent       = Agent::where('fleet_code',$fleet_code)->get();
        return view('document.rc_details.create',compact('vehicle','agent'));
    }

  
    public function store(Request $request)
    {  
        $data = $request->validate([ 'vch_id'            => 'required',
                                     'agent_id'          => 'nullable',   
                                     "rc_amt"            => 'required|numeric',
                                     "valid_from"        => 'required',
                                     "valid_till"        => 'required',
                                     "payment_mode"      => 'required|not_in:0',
                                     "vch_type_id"       => 'nullable',
                                     'rc_no'             => 'required',
                                     "hypothecation_agreement"         =>'nullable',
                                     "engine_no"         =>'nullable',
                                     "chassis_no"        =>'nullable',
                                     "manufacture_year"  =>'nullable',
                                     "type_of_body"      =>'nullable',
                                     "type_of_fuel"      =>'nullable',
                                     "seating_capacity"  =>'nullable',
                                     "cubic_capacity"    =>'nullable',
                                     'doc_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        RcDetails::create($vdata);
        return redirect('rcdetails');
    }

    
    public function show($id)
    {
      
    }

   
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $data       = RcDetails::find($id);
        $agent      = Agent::where('fleet_code',$fleet_code)->get();
       
        return view('document.rc_details.edit',compact('vehicle','data','agent'));
    }
    
    public function update(Request $request, $id)
    {
          $data = $request->validate([ 	 'vch_id'            => 'required',
	                                     'agent_id'          => 'nullable',   
	                                     "rc_amt"            => 'required|numeric',
	                                     "valid_from"        => 'required',
	                                     "valid_till"        => 'required',
	                                     "payment_mode"      => 'required|not_in:0',
	                                     "vch_type_id"       => 'nullable',
	                                     'rc_no'             => 'required',
	                                     "hypothecation_agreement"         =>'nullable',
	                                     "engine_no"         =>'nullable',
	                                     "chassis_no"        =>'nullable',
	                                     "manufacture_year"  =>'nullable',
	                                     "type_of_body"      =>'nullable',
	                                     "type_of_fuel"      =>'nullable',
	                                     "seating_capacity"  =>'nullable',
	                                     "cubic_capacity"    =>'nullable',
	                                     'doc_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data,$id);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

       RcDetails::where('id',$id)->update($vdata);
        return redirect('rcdetails');
    }

    public function destroy($id)
    {
        RcDetails::where('id',$id)->delete();
        return redirect('rcdetails');
    }
    public function export() 
    {
        return Excel::download(new RCDetailsExport, 'RCDetails.xlsx');
    }

     public function import(Request $request) 
    {
        $validator = $request->validate(['file'=> 'required|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp']);
        $data = Excel::import(new PUCDetailsImport,request()->file('file'));
        
        return redirect('pucdetails');
    }
   
    public function download(){        
      $file_path = public_path('demo_files/Demo_RCDetails.xlsx');
      return response()->download($file_path);
    }

    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('doc_file')) {
        
            $filename = $request->file('doc_file')->getClientOriginalName();
            $extension = $request->file('doc_file')->getClientOriginalExtension();
            $fileNameToStore = $request->payment_mode.'_'.$filename;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Document/RCDetails/');
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('doc_file')->storeAs('public/'.$fleet_code.'/Document/RCDetails/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(empty($request->hasFile('doc_file')) && !empty($id)){
           $old_data =RcDetails::where('id',$id)->first();

            if($request->image == null) {
                $vdata['doc_file'] = $old_data->doc_file;    
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
