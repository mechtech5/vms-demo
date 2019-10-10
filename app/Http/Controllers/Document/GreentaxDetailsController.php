<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\GreentaxDetailsExport;
use App\Imports\GreentaxDetailsImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\GreentaxDetails;
use App\vehicle_master;
use File;
use Illuminate\Support\Facades\Storage;
use Auth;


class GreentaxDetailsController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $greentax = GreentaxDetails::where('fleet_code',$fleet_code)->get();
        return view('document.greentax.show',compact('greentax'));
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('document.greentax.create',compact('vehicle'));
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([ 'vch_id'      => 'required',
                                     'agent_id'     => 'required',   
                                     "greentax_amt"  => 'required|numeric',
                                     "valid_from"   => 'required',
                                     "valid_till"   => 'required',
                                     "update_dt"    => 'required',
                                     "payment_mode" => 'required|not_in:0',
                                     'greentax_no'   => 'required|numeric',
                                      'doc_file'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);
    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data);
        $vdata['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;

        GreentaxDetails::create($vdata);
        return redirect('greentax');
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $data       = GreentaxDetails::find($id);
        return view('document.greentax.edit',compact('vehicle','data'));
    }

    
    public function update(Request $request, $id)
    {
        $fleet_code = session('fleet_code');
         $data = $request->validate([ 'vch_id'      => 'required',
                                     'agent_id'     => 'required',   
                                     "greentax_amt"  => 'required|numeric',
                                     "valid_from"   => 'required',
                                     "valid_till"   => 'required',
                                     "update_dt"    => 'required',
                                     "payment_mode" => 'required|not_in:0',
                                     'greentax_no'   => 'required|numeric',
                                      'doc_file'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                     ]);

    
        $data = $this->pay_validate($request,$data);    
        $vdata   = $this->store_image($request,$data,$id);
        $vdata['fleet_code'] = $fleet_code;
        $vdata['created_by'] = Auth::user()->id;
        
        $old_data = GreentaxDetails::find($id);
        GreentaxDetails::where('id',$id)->update($vdata);
       
        if($old_data->doc_file != null && $old_data->doc_file != $vdata['doc_file'] && $vdata['doc_file']!=null){
            Storage::delete('app/public/'.$fleet_code.'/Document/'.$old_data->doc_file);
        }
        return redirect('greentax');
    }

    
    public function destroy($id)
    {
        GreentaxDetails::where('id',$id)->delete();
        $old_data = GreentaxDetails::find($id);
        if(!empty($old_data->doc_file )){
            Storage::delete('app/public/'.$fleet_code.'/Document/Greentax/'.$old_data->doc_file);
        }    
        return redirect('greentax');
    }

     public function export() 
    {
        return Excel::download(new GreentaxDetailsExport, 'GreentaxDetails.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new GreentaxDetailsImport,request()->file('file'));
        
        return redirect('greentax');
    }

     public function download() {
        $file_path = public_path('demo_files/Demo_GreentaxDetails.xlsx');
        return response()->download($file_path);
    }

    public function store_image(Request $request,$vdata,$id='')
    {   
        $fleet_code = session('fleet_code');
        if($request->hasFile('doc_file')) {
        
            $filename = $request->file('doc_file')->getClientOriginalName();
            $extension = $request->file('doc_file')->getClientOriginalExtension();
            $fileNameToStore = $request->payment_mode.'_'.$filename.'.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/Document/Greentax/');
                          
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('doc_file')->storeAs('public/'.$fleet_code.'/Document/Greentax/', $fileNameToStore);
            $vdata['doc_file'] = $fileNameToStore;    
        }
        
       if(!empty($id) && empty($request->hasFile('doc_file'))){
           $old_data =GreentaxDetails::where('id',$id)->first();

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
