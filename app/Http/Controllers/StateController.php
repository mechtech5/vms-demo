<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Exports\StateExport;
use App\Imports\StateImport;
use Maatwebsite\Excel\Facades\Excel;
class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $state = DB::table('master_states')->where('fleet_code',$fleet_code)->get();
        return view('state.show',compact('state'));
    }

 
    public function create()
    {
        return view('state.create');
    }

    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');

        $data = array();
        $this->validate($request,['state'=>'required',
                                  'state_short' => 'required' 
                                ]);

       $data['state_name'] = ucwords($request->state);
       $data['state_code'] = strtoupper($request->state_short);
       $data['fleet_code'] = $fleet_code;
       

       DB::table('master_states')->insert($data);
       return redirect('state');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = DB::table('master_states')->where('id',$id)->get();
        return view('state.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $this->validate($request,['state'=>'required',
                                  'state_short' => 'required' 
                                ]);

       $data['state_name'] = ucwords($request->state);
       $data['state_code'] = strtoupper($request->state_short);
       
       DB::table('master_states')->where('id',$id)->update($data);
       return redirect('state');
    }

    
    public function destroy($id)
    {
        DB::table('master_states')->where('id',$id)->delete();
        return redirect('state');
    }

    public function export() 
    {
        return Excel::download(new StateExport, 'State.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new StateImport,request()->file('file'));
        
        return redirect()->back();
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_State.xlsx');
       return response()->download($file_path);
    }
}
