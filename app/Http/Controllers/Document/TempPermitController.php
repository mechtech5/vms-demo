<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\TempPermitexport;
use App\Imports\TempPermitImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\TempPermit;
use App\vehicle_master;
use App\State;
use Auth;

class TempPermitController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
    
        $temppermit = TempPermit::where('fleet_code',$fleet_code)->get();
        return view('document.temppermit.show',compact('temppermit'));
    }
    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $state_list = State::where('fleet_code',$fleet_code)->get();
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get(); 
        return view('document.temppermit.create',compact('vehicle','state_list'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([ 'vch_id'          => 'required',
                                 'agent_id'            => 'required',   
                                 "tp_state_id"         => 'required|numeric',
                                 "tp_permit_no"        => 'required|numeric',
                                 "tp_permit_start_dt"  => 'required',
                                 "tp_permit_end_dt"    => 'required',
                                  'tp_total_days'      => 'nullable|numeric',
                                  'tp_roadtax_end_dt'  => 'nullable',
                                  'tp_roadtax_start_dt'=> 'nullable',
                                  'curr_loc'           => 'nullable',
                                  'trans_loc'          => 'nullable',
                                  'remarks'            => 'nullable',
                                  'forms_cmpl'         => 'nullable',
                                  'forms_start_dt'     => 'nullable',
                                  'forms_end_dt'       => 'nullable',
                                  'forms_total_days'   => 'nullable|numeric',
                                  'tp_roadtax_no'      => 'nullable|numeric',
                                  'tp_total_days'      => 'nullable|numeric',
                                  'tp_tax_amt'         => 'required|numeric'
                                ]);

        $data['fleet_code'] = session('fleet_code');
        $data['created_by'] = Auth::user()->id;
        TempPermit::create($data);
        return redirect('temppermit');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $state_list = State::where('fleet_code',$fleet_code)->get();
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get(); 
        $data       = TempPermit::find($id);
        return view('document.temppermit.edit',compact('vehicle','state_list','data'));

    }

   
    public function update(Request $request, $id)
    {
         $data = $request->validate([ 'vch_id'          => 'required',
                                 'agent_id'            => 'required',   
                                 "tp_state_id"         => 'required|numeric',
                                 "tp_permit_no"        => 'required|numeric',
                                 "tp_permit_start_dt"  => 'required',
                                 "tp_permit_end_dt"    => 'required',
                                  'tp_total_days'      => 'nullable|numeric',
                                  'tp_roadtax_end_dt'  => 'nullable',
                                  'tp_roadtax_start_dt'=> 'nullable',
                                  'curr_loc'           => 'nullable',
                                  'trans_loc'          => 'nullable',
                                  'remarks'            => 'nullable',
                                  'forms_cmpl'         => 'nullable',
                                  'forms_start_dt'     => 'nullable',
                                  'forms_end_dt'       => 'nullable',
                                  'forms_total_days'   => 'nullable|numeric',
                                  'tp_roadtax_no'      => 'nullable|numeric',
                                  'tp_total_days'      => 'nullable|numeric',
                                  'tp_tax_amt'         => 'required|numeric'
                                ]);

        $data['fleet_code'] = session('fleet_code');
        $vdata['created_by'] = Auth::user()->id;
        TempPermit::where('id',$id)->update($data);
        return redirect('temppermit');
    }

    public function destroy($id)
    {
        TempPermit::where('id',$id)->delete();
        return redirect('temppermit');
    }

     public function export() 
    {
        return Excel::download(new TempPermitexport, 'TempPermit.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new TempPermitImport,request()->file('file'));
        
        return redirect('temppermit');
    }

}
