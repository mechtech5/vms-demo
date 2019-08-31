<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\StatePermitExport;
use App\Imports\StatePermitImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\TempPermit;
use App\vehicle_master;
use App\State;

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
        dd($request);
        $data = $request->validate([ 'vch_id'       => 'required',
                                 'agent_id'      => 'required',   
                                 "tp_state_id"   => 'required|numeric',
                                 "tp_permit_no"        => 'required',
                                 "tp_permit_start_dt"  => 'required',
                                 "tp_permit_end_dt"     => 'required',
                                  'tp_total_days'     =>'nullable',
                                  'tp_roadtax_end_dt'     =>'nullable',
                                  'tp_roadtax_start_dt'     =>'nullable',
                                  'curr_loc'     =>'nullable',
                                  'trans_loc'     =>'nullable',
                                  'remarks'     =>'nullable',
                                  'forms_cmpl'     =>'nullable',
                                  'forms_start_dt'     =>'nullable',
                                  'forms_total_days'     =>'nullable',
                                  'tp_roadtax_no'     =>'nullable',
                                  'tp_total_days'     =>'nullable',
                                  'tp_total_days'     =>'nullable',
                                                               
                                 ]);

        
        $data['']      = $request->tp_roadtax_no;
        $data['']         = $request->tp_tax_amt;
        $data['']  = $request->tp_roadtax_end_dt;
        $data['']= $request->tp_roadtax_start_dt;
        $data['']           = $request->curr_loc;
        $data['']          = $request->trans_loc;
        $data['']            = $request->remarks;
        $data['']         = $request->forms_cmpl;
        $data['']     = $request->forms_start_dt;
        $data['']   = $request->forms_total_days;
        $data['fleet_code'] = session('fleet_code');
        TempPermit::insert($data);
        return redirect('statepermit');
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
}
